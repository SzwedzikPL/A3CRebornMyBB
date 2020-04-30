<?php

namespace App\Badge\Providers;

use App\Badge\Model\Badge;
use App\Badge\Model\BadgeGroup;
use App\Badge\Policies\BadgeGroupPolicy;
use App\Badge\Policies\BadgePolicy;
use Illuminate\Support\ServiceProvider;

class BadgeServiceProvider extends ServiceProvider
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
        $this->registerPolicies();
    }

    /**
     * Register policies
     */
    private function registerPolicies()
    {
        Gate::policy(Badge::class, BadgePolicy::class);
        Gate::policy(BadgeGroup::class, BadgeGroupPolicy::class);
    }
}
