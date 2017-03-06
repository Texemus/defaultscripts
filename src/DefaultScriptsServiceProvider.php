<?php

namespace Texemus;

use Illuminate\Support\ServiceProvider;


/**
 * Class DefaultScriptsServiceProvider
 * @package Texemus/DefaultScripts
 */
class DefaultScriptsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            CreateTexemus::class,
            UpdateTexemus::class,
        ]);
    }
}
