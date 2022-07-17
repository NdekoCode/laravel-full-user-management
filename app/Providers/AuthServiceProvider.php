<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('superAdmin-access', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('vip-access', function (User $user) {
            return $user->isSuperAdmin() || $user->isAdmin();;
        });
        Gate::define('Admin-access', function (User $user) {
            return $user->isAdmin();
        });
        Gate::define('Editor-access', function (User $user) {
            return $user->isEditor();
        });
        //
    }
}
