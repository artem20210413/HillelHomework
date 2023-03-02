<?php

namespace App\Providers;

use App\Repositories\PostRepositoryInterface;
use App\Services\PostsMAxMindServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class PostsFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind("App\Repositories\PostsRepositoryInterface");
        $this->app->bind('postMAxMindServices', function (Application $app) {
            return new PostsMAxMindServices(
                $app->make(PostRepositoryInterface::class)
            );
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
