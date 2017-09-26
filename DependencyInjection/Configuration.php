<?php

namespace Webit\Bundle\ShipmentDpdAdapter\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $root = $treeBuilder->root('webit_shipment_dpd_adapter');

        $root
            ->children()
                ->arrayNode('auth_services')->isRequired()->cannotBeEmpty()
                    ->children()
                        ->scalarNode('login')->end()
                        ->scalarNode('password')->end()
                        ->scalarNode('fid')->end()
                    ->end()
                ->end()
                ->arrayNode('auth_info_services')->isRequired()->cannotBeEmpty()
                    ->children()
                        ->scalarNode('login')->end()
                        ->scalarNode('password')->end()
                        ->scalarNode('channel')->end()
                    ->end()
                ->end()
                ->booleanNode('test_mode')->defaultFalse()->end()
                ->scalarNode('default_language')->defaultValue('PL')->cannotBeEmpty()->end()
                ->scalarNode('default_currency')->defaultValue('PLN')->cannotBeEmpty()->end()
                ->scalarNode('vendor_class')->defaultValue('Webit\Shipment\Vendor\Vendor')->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}