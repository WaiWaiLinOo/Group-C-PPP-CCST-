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
        /*Customer*/
        $this->app->bind('App\Contracts\Dao\customer\CustomerDaoInterface', 'App\Dao\customer\CustomerDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\auth\UserServiceInterface', 'App\Services\auth\UserService');
        /*Customer*/
        $this->app->bind('App\Contracts\Services\customer\CustomerServiceInterface', 'App\Services\customer\CustomerService');
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
