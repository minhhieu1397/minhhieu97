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
        $this->app->bind('App\Services\Interfaces\Admin\AdminInterface', 'App\Services\Admin\AdminService');
        $this->app->bind('App\Services\Interfaces\Admin\TimesheetInterface', 'App\Services\Admin\TimesheetService');
        $this->app->bind('App\Services\Interfaces\Admin\UserInterface', 'App\Services\Admin\UserService');
        $this->app->bind('App\Services\Interfaces\User\TimesheetInterface', 'App\Services\User\TimesheetService');
        $this->app->bind('App\Services\Interfaces\User\UserInterface', 'App\Services\User\UserService');
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
