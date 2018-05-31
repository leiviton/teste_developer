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
            'TestDeveloper\Repositories\BookingRepository',
            'TestDeveloper\Repositories\BookingRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\MovieRepository',
            'TestDeveloper\Repositories\MovieRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\SessionRepository',
            'TestDeveloper\Repositories\SessionRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\SeatRepository',
            'TestDeveloper\Repositories\SeatRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\RoomRepository',
            'TestDeveloper\Repositories\RoomRepositoryEloquent'
        );
        $this->app->bind(
            'TestDeveloper\Repositories\UserRepository',
            'TestDeveloper\Repositories\UserRepositoryEloquent'
        );
    }
}

