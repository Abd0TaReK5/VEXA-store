<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Policies\RolePolicy;
use Spatie\Permission\Models\Role;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
        return $user->role
            ?->permissions
            ->contains('name', $ability) ? true : null;
    });
    Gate::policy(Role::class, RolePolicy::class);

    }
}
