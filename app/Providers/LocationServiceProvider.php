<?php

namespace App\Providers;

use App\Repositories\LocationInterface;
use App\Services\LocationService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(LocationInterface::class, LocationService::class);
//        $this->app->bind('location', function (Application $app){
//            return new LocationService($app->make(LocationInterface::class));
//        });

        $this->app->bind('location', function (){
            return new LocationService( );
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
