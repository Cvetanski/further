<?php

namespace App\Providers;

use App\Venues\Repositories\Contracts\VenueRepositoryInterface;
use App\Venues\Repositories\EloquentVenueRepository;
use App\Vote\Repositories\Contracts\VoteRepositoryInterface;
use App\Vote\Repositories\EloquentVoteRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            VenueRepositoryInterface::class,
            EloquentVenueRepository::class
        );

        $this->app->bind(
            VoteRepositoryInterface::class,
            EloquentVoteRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
