<?php

namespace FjordApp\Providers;

use Illuminate\Support\Facades\View;
use FjordApp\Composers\LoginComposer;
use Illuminate\Support\ServiceProvider;

class FjordServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('fjord::auth.login', LoginComposer::class);
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
