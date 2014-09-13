<?php
namespace Volleyball\Bundle\PasselBundle\DependencyInjection;

class Configuration implements \Symfony\Component\Config\Definition\ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new \Symfony\Component\Config\Definition\Builder\TreeBuilder();
        $rootNode = $treeBuilder->root('volleyball_passel');

        return $treeBuilder;
    }
}
