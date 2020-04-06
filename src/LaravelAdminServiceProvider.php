<?php

namespace Devfaysal\LaravelAdmin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Devfaysal\LaravelAdmin\Components\Text;

class LaravelAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-admin');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-admin');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->registerComponents();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-admin.php' => config_path('laravel-admin.php'),
            ], 'config');

            // $this->publishes([
            //     __DIR__.'/../database/migrations/' => database_path('migrations')
            // ], 'migrations');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-admin'),
            ], 'laravel-admin-views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/laravel-admin'),
            ], 'laravel-admin-public');
            // Publishing seeds.
            $this->publishes([
                __DIR__.'/../database/seeds' => database_path('seeds'),
            ], 'laravel-admin-seeds');

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-admin'),
            ], 'laravel-admin-lang');

            // Registering package commands.
            // $this->commands([]);

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-admin.php', 'laravel-admin');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-admin', function () {
            return new LaravelAdmin;
        });
    }

    public function registerComponents()
    {
        Blade::component('laravel-admin::components.tooltip', 'tooltip');
        Blade::component('laravel-admin::components.fields.text', 'text');
    }
}
