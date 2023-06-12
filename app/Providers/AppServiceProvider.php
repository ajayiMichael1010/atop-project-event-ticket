<?php

namespace App\Providers;

use App\Http\Controllers\EventController;
use App\Http\Services\EventService;
use App\Http\Services\MediaManagerService;
use App\Http\Services\ServiceImpl\CloudinaryServiceImpl;
use App\Http\Services\ServiceImpl\EventServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MediaManagerService::class,CloudinaryServiceImpl::class);

        $this->app->when(EventController::class)
            ->needs(EventService::class)
            ->give(EventServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
