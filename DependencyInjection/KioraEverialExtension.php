<?php


namespace Kiora\EverialBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class KioraEverialExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('client.xml');

        $configuration = new Configuration();
        $processor = new Processor();
        $config = $processor->processConfiguration($configuration, $configs);

        $container->setParameter('kiora.everial.auth_base_path', $config['auth_base_path']);
        $container->setParameter('kiora.everial.base_path', $config['base_path']);
        $container->setParameter('kiora.everial.username', $config['username']);
        $container->setParameter('kiora.everial.password', $config['password']);

    }
}