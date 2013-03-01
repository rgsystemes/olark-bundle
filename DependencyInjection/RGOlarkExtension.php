<?php

namespace RG\OlarkBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class RGOlarkExtension extends Extension
{
    /**
     * Loads our service, accessible as "rg_olark"
     *
     * @param  array            $configs
     * @param  ContainerBuilder $container
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->loadConfiguration($configs, $container);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('olark.xml');
    }

    /**
     * Loads the configuration in, with any defaults
     *
     * @param array $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    protected function loadConfiguration(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter("rg_olark.id", $config["id"]);
    }
}
