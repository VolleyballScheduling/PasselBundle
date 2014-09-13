<?php
namespace Volleyball\Bundle\PasselBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader;

class VolleyballPasselExtension extends \Symfony\Component\HttpKernel\DependencyInjection\Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, \Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader(
            $container,
            new \Symfony\Component\Config\FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yml');
    }
}
