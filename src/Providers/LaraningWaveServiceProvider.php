<?php

namespace Laraning\Wave\Providers;

use Illuminate\Support\ServiceProvider;

class LaraningWaveServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslations();
        $this->loadViews();
        $this->publishAssets();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Laraning\Wave\Providers\RouteServiceProvider::class);
        $this->app->register(\Laraning\Wave\Providers\UserInterfaceServiceProvider::class);
    }

    public function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'wave');
    }

    public function loadViews()
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'wave');
    }

    public function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../Resources/Assets' => public_path('assets/wave/'),
        ], 'laraning-wave-assets');
    }
}