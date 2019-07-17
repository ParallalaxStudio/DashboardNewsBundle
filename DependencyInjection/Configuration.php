<?php

namespace Parallalax\DashboardNewsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('parallalax_dashboard_news')->isRequired();
        $rootNode
            ->children()
                ->scalarNode('news_class')
                    ->cannotBeEmpty()
                ->end()
                ->arrayNode('form')->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('news')->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('Parallalax\DashboardNewsBundle\Form\NewsType')->end()
                                //->scalarNode('name')->defaultValue('fos_comment_comment')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
