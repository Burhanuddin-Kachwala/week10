<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
       
        Gate::before( function (Admin $admin) {
            return $admin->role->slug === 'admin';
        });
        // Fetch all permissions and define Gates dynamically
        Permission::all()->each(function ($permission) {
            Gate::define($permission->slug, function (Admin $admin) use ($permission) {
                return $admin->role->permissions->contains('slug', $permission->slug);
            });
        });

       
    }
}
