<?php

namespace Webit\Bundle\ShipmentDpdAdapter\Tests;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap\AppKernel;
use Webit\Shipment\DpdAdapter\Vendor\VendorFactory;
use Webit\Shipment\Manager\VendorAdapterProviderInterface;

class WebitShipmentDpdAdapterBundleIntegrationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContainerInterface
     */
    private $container;

    protected function setUp()
    {
        $kernel = new AppKernel(
            $this->dumpConfig($this->defaultConfig())
        );

        $kernel->boot();
        $this->container = $kernel->getContainer();
    }

    /**
     * @test
     */
    public function shouldRegisterDpdAdapter()
    {
        /** @var VendorFactory $vendorFactory */
        $vendorFactory = $this->container->get('webit_shipment_dpd_adapter.vendor_factory');

        /** @var VendorAdapterProviderInterface $adapterProvider */
        $adapterProvider = $this->container->get('webit_shipment.vendor_adapter_provider');

        $vendor = $vendorFactory->create();
        $adapter = $adapterProvider->getVendorAdapter($vendor);

        $this->assertInstanceOf('Webit\Shipment\DpdAdapter\ShipmentDpdAdapter', $adapter);
    }

    private function defaultConfig()
    {
        $yml = <<<YML
services:
    sender_provider:
        class: "Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap\SenderProvider"
    cache:
        class: "Doctrine\Common\Cache\VoidCache"
        
framework:
    secret: sdfadsfdasf
    
doctrine:
    dbal:
        connections:
            default:
                driver: pdo_sqlite
                path: %kernel.cache_dir%
    orm:
        default_entity_manager:  ~
        
webit_shipment:
    default_sender_address_provider: sender_provider
    vendor:
        cache_service: cache
        cache_enabled: false
    model_map:
        sender_address: "Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap\Entity\Address"
        delivery_address: "Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap\Entity\Address"
        
webit_shipment_dpd_adapter:
    auth:
        login: login
        password: password
        fid: fid
    vendor_class: "Webit\Shipment\Vendor\Vendor"
YML;

        return $yml;
    }

    private function dumpConfig($config)
    {
        $configFile = tempnam(sys_get_temp_dir(), 'config_').'.yml';

        file_put_contents($configFile, $config);

        return $configFile;
    }
}