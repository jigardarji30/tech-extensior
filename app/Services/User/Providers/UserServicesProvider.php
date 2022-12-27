<?php

namespace App\Services\User\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\User\UserServices;
use App\Repositories\User\UserInterface;
use Illuminate\Contracts\Support\DeferrableProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserServicesProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerService();
    }

    protected function registerService()
    {

        $this->app->bind(UserServices::class, function ($app) {
            return new UserServices($app[UserInterface::class]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [UserServices::class];
    }
}
