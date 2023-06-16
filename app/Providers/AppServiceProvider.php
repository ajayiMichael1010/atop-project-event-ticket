<?php

namespace App\Providers;

use App\Http\Controllers\EventController;
use App\Http\Services\EstateService;
use App\Http\Services\EventService;
use App\Http\Services\DocumentMakerService;
use App\Http\Services\MediaManagerService;
use App\Http\Services\ServiceImpl\CloudinaryServiceImpl;
use App\Http\Services\ServiceImpl\EstateServiceImpl;
use App\Http\Services\ServiceImpl\EventServiceImpl;
use App\Http\Services\ServiceImpl\PdfDocumentMakerServiceImpl;
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

        $this->app->bind(EstateService::class,EstateServiceImpl::class);
        $this->app->bind(DocumentMakerService::class, PdfDocumentMakerServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
