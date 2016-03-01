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
    }

    /**
     * @{inheritdoc}
     */
    public function buildContainer(array $config, ContainerBuilder $container)
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix()
    {
        return 'volleyball_passel';
    }
}
