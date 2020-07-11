<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // posts
          Gate::resource('posts', 'App\Policies\PostPolicy');
          Gate::define('posts.publisher', 'App\Policies\PostPolicy@publisher');
        //users
          Gate::resource('users', 'App\Policies\UserPolicy');
          Gate::define('users.assignRole', 'App\Policies\UserPolicy@assignRole');
        //roles
          Gate::resource('roles', 'App\Policies\rolePolicy');
        //permissions
          Gate::resource('permissions','App\Policies\PermissionPolicy');
        //categories
          Gate::resource('categories','App\Policies\CategoryPolicy');
        //tags
          Gate::resource('tags','App\Policies\TagPolicy');
          
    }
}
