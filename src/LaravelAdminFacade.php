<?php

namespace Devfaysal\LaravelAdmin;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Devfaysal\LaravelAdmin\Skeleton\SkeletonClass
 */
class LaravelAdminFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-admin';
    }
}
