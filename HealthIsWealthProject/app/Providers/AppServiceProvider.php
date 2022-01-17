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
        $this->app->bind('App\Contracts\Dao\auth\UserDaoInterface', 'App\Dao\auth\UserDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\auth\UserServiceInterface', 'App\Services\auth\UserService');
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
