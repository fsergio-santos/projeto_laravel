<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\PermissionService;


class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PermissionService::class,function(){
            return new PermissionService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
