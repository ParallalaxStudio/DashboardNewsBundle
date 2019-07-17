<?php

namespace Parallalax\DashboardNewsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Yaml as YamlParser;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class ParallalaxDashboardNewsExtension extends Extension implements PrependExtensionInterface
{
    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/';
    }

    public function getNamespace()
    {
        return '';
    }

    public function getAlias()
    {
        return 'parallalax_dashboard_news';
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter(self::getAlias() .'.news_class', $config['news_class']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container)
    {
        $yamlParser = new YamlParser();

        try {
            $doctrineConfig = $yamlParser->parse(
                file_get_contents(__DIR__.'/../Resources/config/doctrine.yml')
            );
        } catch (ParseException $e) {
            throw new InvalidArgumentException(sprintf('The file "%s" does not contain valid YAML.', $doctrineConfig), 0, $e);
        }
        $container->prependExtensionConfig('doctrine', $doctrineConfig['doctrine']);
    }
}
