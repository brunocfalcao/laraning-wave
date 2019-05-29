<?php

namespace Laraning\Wave\Providers;

use Spatie\Csp\AddCspHeaders;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        app()->make('router')->aliasMiddleware('wave.guest', \Laraning\Wave\Middleware\RedirectIfAuthenticated::class);
        app()->make('router')->aliasMiddleware('wave.role', \Laraning\Wave\Middleware\Role::class);
        //app()->make('router')->aliasMiddleware('wave.permission', \Laraning\Wave\Middleware\Permission::class);
        app()->make('router')->aliasMiddleware('wave.auth', \Laraning\Wave\Middleware\Authenticate::class);

        Route::middleware('web')
             ->prefix('wave')
             ->namespace('\Laraning\Wave')
             ->group(__DIR__.'/../Routes/web.php');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
