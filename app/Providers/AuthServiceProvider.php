<?php

namespace App\Providers;

use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('post', PostPolicy::class);
        Gate::resource('user', UserPolicy::class);
        Gate::resource('role', RolePolicy::class);
        Gate::resource('page', PagePolicy::class);
        Gate::resource('product', ProductPolicy::class);
        Gate::define('post.publish', PostPolicy::class . '@publish');
        Gate::define('post.draft', PostPolicy::class . '@draft');
    }
}
