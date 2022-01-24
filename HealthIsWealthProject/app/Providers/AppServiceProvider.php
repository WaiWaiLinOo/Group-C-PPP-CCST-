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
        //Role 
        $this->app->bind('App\Contracts\Dao\role\RoleDaoInterface', 'App\Dao\role\RoleDao');
        //Post 
        $this->app->bind('App\Contracts\Dao\post\PostDaoInterface', 'App\Dao\post\PostDao');
        //Comment 
        $this->app->bind('App\Contracts\Dao\comment\CommentDaoInterface', 'App\Dao\comment\CommentDao');
        // Business logic registration
        $this->app->bind('App\Contracts\Services\auth\UserServiceInterface', 'App\Services\auth\UserService');
        /*Customer*/
        $this->app->bind('App\Contracts\Services\customer\CustomerServiceInterface', 'App\Services\customer\CustomerService');
        //Role 
        $this->app->bind('App\Contracts\Services\role\RoleServiceInterface', 'App\Services\role\RoleService');
        //post 
        $this->app->bind('App\Contracts\Services\post\PostServiceInterface', 'App\Services\post\PostService');
        //Comment 
        $this->app->bind('App\Contracts\Services\comment\CommentServiceInterface', 'App\Services\comment\CommentService');

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
