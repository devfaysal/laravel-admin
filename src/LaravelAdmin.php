<?php

namespace Devfaysal\LaravelAdmin;

class LaravelAdmin
{
    /**
     * Get the URI prefix utilized by LaravelAdmin.
     *
     * @return string
     */
    public static function prefix()
    {
        return config('laravel-admin.prefix', '/admin');
    }
}
