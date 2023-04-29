<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("product", function (User $user) {
            return $user->access_product == 1 && $user->access_user ==  0;
        });

        Gate::define("category", function (User $user) {
            return $user->access_category == 1 && $user->access_user ==  0;
        });

        Gate::define("brand", function (User $user) {
            return $user->access_brand == 1 && $user->access_user ==  0;
        });

        Gate::define("admin", function (User $user) {
            return $user->access_user == 1
                && $user->access_brand == 0
                && $user->access_category == 0
                && $user->access_product == 0;
        });
    }
}
