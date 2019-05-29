<?php

namespace Laraning\Wave\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViewComposers();
        $this->registerBladeDirectives();
    }

    protected function registerBladeDirectives()
    {
        Blade::directive(
            'error',
            function ($expression) {
                return "<?php echo (new \\Laraning\\Wave\\BladeDirectives\\Error($expression))->render() ?>";
            }
        );
    }

    protected function registerViewComposers()
    {
        // Global view composer operations.
        view()->composer('*', function (View $view) {
            if (Route::current() != null) {
                $parameters = collect(Route::current()->parameters());
                $models = collect();
                $parameters->each(function ($item) use ($models) {
                    if (get_parent_class($item) == 'Illuminate\Database\Eloquent\Model') {
                        $models->push($item);
                    }
                });

                $view->with('models', $models)
                     ->with('model', $models->count() > 0 ? $models->first() : null);
            };
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    }
}
