<?php

namespace Webit\Bundle\ShipmentDpdAdapter\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class WebitShipmentDpdAdapterExtension extends Extension
{

    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter('webit_shipment_dpd_adapter.auth.login', $config['auth']['login']);
        $container->setParameter('webit_shipment_dpd_adapter.auth.password', $config['auth']['password']);
        $container->setParameter('webit_shipment_dpd_adapter.auth.fid', $config['auth']['fid']);
        $container->setParameter('webit_shipment_dpd_adapter.default_language', $config['default_language']);
        $container->setParameter('webit_shipment_dpd_adapter.default_currency', $config['default_currency']);
        $container->setParameter('webit_shipment_dpd_adapter.vendor_class', $config['vendor_class']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('adapter.xml');
    }
}