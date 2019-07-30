<?php

namespace Laraning\Wave\Providers;

use Illuminate\Support\Collection;
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
        $this->registerMacros();
    }

    protected function registerMacros()
    {
        // Include all files from the Macros folder.
        Collection::make(glob(__DIR__.'/../Macros/*.php'))
                  ->mapWithKeys(function ($path) {
                      return [$path => pathinfo($path, PATHINFO_FILENAME)];
                  })
                  ->each(function ($macro, $path) {
                      require_once $path;
                  });
    }

    protected function registerAuth()
    {
        $this->app['config']->set(
            'auth.guards',
            array_merge($this->app['config']->get('auth.guards'), [
            'wave' => [
                'driver' => 'session',
                'provider' => 'wave',
            ],
            ])
        );

        $this->app['config']->set(
            'auth.providers',
            array_merge($this->app['config']->get('auth.providers'), [
            'wave' => [
                'driver' => 'eloquent',
                'model' => \Laraning\DAL\Models\User::class,
            ],
            ])
        );
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
        $this->registerAuth();
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
