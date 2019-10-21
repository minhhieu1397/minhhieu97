<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Interfaces\AdminServiceInterface', 'App\Services\AdminService');
        $this->app->bind('App\Services\Interfaces\TimesheetServiceInterface', 'App\Services\TimesheetService');
        $this->app->bind('App\Services\Interfaces\UserServiceInterface', 'App\Services\UserService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
