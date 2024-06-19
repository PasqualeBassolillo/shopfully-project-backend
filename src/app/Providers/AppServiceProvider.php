<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Flyer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Flyer::class, function ($app) {
            return new Flyer();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
