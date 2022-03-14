<?php

namespace RG\OlarkBundle\DependencyInjection;

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
        $treeBuilder = new TreeBuilder("rg_olark");
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->
            children()->
                scalarNode("id")->end()->
            end()
        ;

        return $treeBuilder;
    }
}
