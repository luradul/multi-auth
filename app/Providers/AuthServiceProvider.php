<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Post;
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
        Post::class => PostPolicy::class,
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
        //$user == ULOGOVAN/AUTENTIKOVAN user
        Gate::define('is-subscriber', function($user) {
            //predvidja se da vec imas popunjeno odredjeno polje koje zelis da sluzi kao provera
            return $user->subscriptions !== 'without';
        });
        // znaci: ako je ulogovan neki korisnik koji nema pomenuti uslov, dobice "403|This action is unauthorized."
        Gate::define('can-send-emails', function ($user) {
            return $user->subscriptions == 'premium';
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
