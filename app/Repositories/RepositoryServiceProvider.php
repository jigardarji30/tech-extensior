<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Support\DeferrableProvider;


class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserRepository();
    }

    protected function registerUserRepository()
    {
        $this->app->bind(UserInterface::class, function () {
            return new UserRepository(new User());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            UserInterface::class,
        ];
    }
}
