<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }


    // public function boot()
    // {
    //     view()->composer('*', function ($view) {
    //         $categories = Category::latest()->get();
    //         $view->with('header_categories', $categories);
    //     });
    // }
}
