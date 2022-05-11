<?php

namespace ContainerFQgQBRE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrineMigrations_ExecuteCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'doctrine_migrations.execute_command' shared service.
     *
     * @return \Doctrine\Migrations\Tools\Console\Command\ExecuteCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/lib/Doctrine/Migrations/Tools/Console/Command/DoctrineCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/lib/Doctrine/Migrations/Tools/Console/Command/ExecuteCommand.php';

        $container->privates['doctrine_migrations.execute_command'] = $instance = new \Doctrine\Migrations\Tools\Console\Command\ExecuteCommand(($container->privates['doctrine.migrations.dependency_factory'] ?? $container->load('getDoctrine_Migrations_DependencyFactoryService')), 'doctrine:migrations:execute');

        $instance->setName('doctrine:migrations:execute');

        return $instance;
    }
}
