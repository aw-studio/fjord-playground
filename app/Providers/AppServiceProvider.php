<?php

namespace App\Providers;

use Fjord\Support\Facades\Form;
use Fjord\Support\Facades\Fjord;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Fjord::installed()) {
            View::share('settings', Form::load('collections', 'settings'));
        }
    }
}
