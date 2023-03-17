<?php

namespace App\Providers;

use App\Jobs\VisitJob;
use App\Services\Middleware\InfoByRequestService;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class VisitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VisitJob::class, 'handle', function (VisitJob $job, Application $app) {
            $job->handle($app->make(InfoByRequestService::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
