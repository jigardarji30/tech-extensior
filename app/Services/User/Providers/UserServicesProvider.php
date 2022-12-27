<?php

namespace App\Services\User\Providers;

use App\Services\User\UserServices;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserInterface;
use Illuminate\Contracts\Support\DeferrableProvider;

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
