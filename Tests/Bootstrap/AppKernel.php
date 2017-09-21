<?php

namespace Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;
use Webit\Bundle\ShipmentBundle\WebitShipmentBundle;
use Webit\Bundle\ShipmentDpdAdapter\WebitShipmentDpdAdapterBundle;

class AppKernel extends Kernel
{
    /**
     * @var string
     */
    private $kernelId;

    /**
     * @var string
     */
    private $config;

    /**
     * AppKernel constructor.
     * @param string $config
     */
    public function __construct($config)
    {
        parent::__construct('test', true);
        $this->kernelId = substr(md5(microtime().mt_rand(0, 100000)), 0, 8);
        $this->config = $config;
    }

    /**
     * Returns an array of bundles to register.
     *
     * @return BundleInterface[] An array of bundle instances
     */
    public function registerBundles()
    {
        return array(
            new FrameworkBundle(),
            new WebitShipmentBundle(),
            new WebitShipmentDpdAdapterBundle(),
            new DoctrineBundle()
        );
    }

    /**
     * Loads the container configuration.
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        if (!$this->config) {
            throw new \RuntimeException('Config for the Kernel must be set.');
        }

        $loader->load($this->config);
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir()
    {
        return sys_get_temp_dir().'/'.$this->kernelId.'/cache';
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir()
    {
        return sys_get_temp_dir().'/'.$this->kernelId .'/logs';
    }
}