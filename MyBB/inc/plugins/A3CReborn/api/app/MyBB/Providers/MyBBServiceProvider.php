<?php

namespace App\MyBB\Providers;

use App\MyBB\Services\MyBBGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class MyBBServiceProvider extends ServiceProvider
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
        Auth::extend('mybb', function ($app, $name, array $config) {
            return new MyBBGuard(Auth::createUserProvider($config['provider']));
        });
    }
}
