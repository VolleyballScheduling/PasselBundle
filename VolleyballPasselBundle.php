<?php
namespace Volleyball\Bundle\PasselBundle;

use \Symfony\Component\DependencyInjection\ContainerBuilder;

class VolleyballPasselBundle extends \Knp\RadBundle\AppBundle\Bundle
{
    /**
     * @{inheritdoc}
     */
    public function buildConfiguration(NodeParentInterface $rootNode)
    {
//        $rootNode
//            ->children()
//                ->scalarNode('foo')
//                    ->defaultValue('bar')
//                ->end()
//            ->end();
    }

    /**
     * @{inheritdoc}
     */
    public function buildContainer(array $config, ContainerBuilder $container)
    {
        // here $config is the parsed configuration
//        $container->setParameter('app.foo', $config['foo']);
    }

    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix()
    {
        return 'volleyball_passel';
    }
}
