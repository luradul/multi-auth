<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->customGates();
    }

    /**
     * This method is used to group all custom gates
     */
    public function customGates()
    {
        Gate::define('is-subscriber', function($user) {
            return $user->subscriptions !== 'without';
        });

        Gate::define('has-monthly-access', function($user) {
            return $user->subscriptions == 'monthly';
        });

        Gate::define('has-yearly-access', function($user) {
            return $user->subscriptions == 'yearly';
        });

        Gate::define('has-premium-access', function($user) {
            return $user->subscriptions == 'premium';
        });
    }
}
