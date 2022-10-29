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
        // dd(config('permissions.access.list-product'));


        //page
        Gate::define('page-list', 'App\Policies\PagePolicy@view');
        Gate::define('page-add', 'App\Policies\PagePolicy@create');

        //post
        Gate::define('post-list', 'App\Policies\PostPolicy@view');
        Gate::define('post-add', 'App\Policies\PostPolicy@create');

        //product
        Gate::define('product-list', 'App\Policies\ProductPolicy@view');
        Gate::define('product-add', 'App\Policies\ProductPolicy@create');


           //product
           Gate::define('member-list', 'App\Policies\MemberPolicy@view');
           Gate::define('member-add', 'App\Policies\MemberPolicy@create');


          //Order
          Gate::define('order-list', 'App\Policies\OrderPolicy@view');

           //role
        Gate::define('role-add', 'App\Policies\RolePolicy@create');




        // Gate::define('page-list', function ($user) {
        //     // return $user->isAdmin
        //    return $user->checkPermissionAccess(config('permissions.access.list-page'));
        // });

        // Gate::define('post-list', function ($user) {
        //     // return $user->isAdmin
        //    return $user->checkPermissionAccess('list_post');
        // });
        //
    }
}
