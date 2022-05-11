<?php

namespace ContainerFQgQBRE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_DMC20ZEService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.DMC20ZE' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.DMC20ZE'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'recordRepository' => ['privates', 'App\\Repository\\RecordRepository', 'getRecordRepositoryService', true],
        ], [
            'recordRepository' => 'App\\Repository\\RecordRepository',
        ]);
    }
}
