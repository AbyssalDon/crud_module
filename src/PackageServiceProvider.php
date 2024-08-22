<?php

namespace Abbas\CrudModule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Gate;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
		$this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'my-package-migrations');
        $this->loadRoutesFrom(__DIR__.'/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'CrudModule');
        
        $this->app['router']->aliasMiddleware('myauth', Authenticate::class);
        $this->app['router']->aliasMiddleware('myverified', EnsureEmailIsVerified::class);
		
		Gate::policy(Product::class, ProductPolicy::class);
    }

    public function register()
    {
        // Code to register services
    }
}