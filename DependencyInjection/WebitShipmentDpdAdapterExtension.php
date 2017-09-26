<?php

namespace Webit\Bundle\ShipmentDpdAdapter\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Webit\DPDClient\DPDServices\Client\ClientEnvironments;

class WebitShipmentDpdAdapterExtension extends Extension
{

    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter('webit_shipment_dpd_adapter.auth_services.login', $config['auth_services']['login']);
        $container->setParameter('webit_shipment_dpd_adapter.auth_services.password', $config['auth_services']['password']);
        $container->setParameter('webit_shipment_dpd_adapter.auth_services.fid', $config['auth_services']['fid']);
        $container->setParameter('webit_shipment_dpd_adapter.auth_info_services.login', $config['auth_info_services']['login']);
        $container->setParameter('webit_shipment_dpd_adapter.auth_info_services.password', $config['auth_info_services']['password']);
        $container->setParameter('webit_shipment_dpd_adapter.auth_info_services.channel', $config['auth_info_services']['channel']);
        $container->setParameter('webit_shipment_dpd_adapter.default_language', $config['default_language']);
        $container->setParameter('webit_shipment_dpd_adapter.default_currency', $config['default_currency']);
        $container->setParameter('webit_shipment_dpd_adapter.vendor_class', $config['vendor_class']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('adapter.xml');

        if ($config['test_mode']) {
            $factory = $container->getDefinition('webit_shipment_dpd_adapter.dpd_client');
            $factory->replaceArgument(1, ClientEnvironments::wsdl(ClientEnvironments::TEST));
        }
    }
}