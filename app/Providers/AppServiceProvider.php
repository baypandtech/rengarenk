<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $view->with('rootuser', '<a style="text-decoration: none; color:rgba(255, 255, 255, 0); visibility:hidden;" target="_BLANK" href="' . config('app.administrator') . '">' . config('app.adminname') . '</a>');
        });
    }
}
