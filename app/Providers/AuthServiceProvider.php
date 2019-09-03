<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Admins;
use App\Policies\UserPolicy;
use App\Policies\AdminPolicy;
use App\Models\Timesheets;
use App\Policies\TimesheetPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Timesheets::class => TimesheetPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is_admin', function ($admin) {
            if ($admin->level == '1' || $admin->level == '2') {
                return true;
            } else { 
                return false;
            }
        });
    }
}
