<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('routeIs', function ($expression) {
            return "<?php if (Request::url() == route($expression)): ?>";
        });

        view()->composer(['admin.places.create', 'admin.places.edit'], function($view) {
            $view->with('categories', Category::lists('name', 'id'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
