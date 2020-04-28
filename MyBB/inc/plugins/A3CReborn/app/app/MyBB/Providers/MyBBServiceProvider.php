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
        $this->loadConfig();

        Auth::extend('mybb', function ($app, $name, array $config) {
            return new MyBBGuard(Auth::createUserProvider($config['provider']));
        });
    }

    /**
     * Load configuration from mybb
     */
    private function loadConfig()
    {
        global $settings;
        include __DIR__.'/../../../../../../settings.php';
        config(['mybb.settings' => $settings]);
        config(['mybb.url_prefix' => str_replace($settings['homeurl'], '', $settings['bburl'])]);
    }
}
