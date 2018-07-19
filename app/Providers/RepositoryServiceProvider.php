<?php

namespace TestDeveloper\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'TestDeveloper\Repositories\SecretFriendRepository',
            'TestDeveloper\Repositories\SecretFriendRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\ParticipantRepository',
            'TestDeveloper\Repositories\ParticipantRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\SessionRepository',
            'TestDeveloper\Repositories\SessionRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\WishlistRepository',
            'TestDeveloper\Repositories\WishlistRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\SecretFriendParticipantRepository',
            'TestDeveloper\Repositories\SecretFriendParticipantRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\UserRepository',
            'TestDeveloper\Repositories\UserRepositoryEloquent'
        );
    }
}

