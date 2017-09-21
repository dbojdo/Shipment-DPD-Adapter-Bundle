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
                ->arrayNode('auth')->isRequired()->cannotBeEmpty()
                    ->children()
                        ->scalarNode('login')->end()
                        ->scalarNode('password')->end()
                        ->scalarNode('fid')->end()
                    ->end()
                ->end()
                ->scalarNode('default_language')->defaultValue('PL')->cannotBeEmpty()->end()
                ->scalarNode('default_currency')->defaultValue('PLN')->cannotBeEmpty()->end()
                ->scalarNode('vendor_class')->isRequired()->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}