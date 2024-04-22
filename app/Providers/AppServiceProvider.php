<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
Use Illuminate\Support\Facades\Gate;

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
        Gate::define('schedule-class', function(User $user) {
            return $user->role === 'instructor';
        });
    }
}
