<?php

namespace walthere\CKEditor;

use Illuminate\Support\ServiceProvider;

class CKServiceProvider extends ServiceProvider{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }

        $configPath = realpath(__DIR__ . '/config/CK.php');
        $this->mergeConfigFrom($configPath, 'CKEditor');
        $this->publishes([$configPath => config_path('CK.php')], 'config');

        $viewPath = realpath(__DIR__ . '/views');
        $this->loadViewsFrom($viewPath, 'CKEditor');
        $this->publishes([
            realpath(__DIR__ . '/views') => base_path('resources/views/vendor/CKEditor'),
        ], 'view');
        $this->publishes([
            realpath(__DIR__ . '/resources') => public_path() . '/assets/js/ckeditor',
        ], 'assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = realpath(__DIR__ . '/../config/CK.php');

    }



}