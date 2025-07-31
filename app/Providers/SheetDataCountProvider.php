<?php

namespace App\Providers;

use App\Services\DataService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SheetDataCountProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $service = app(DataService::class);
            $view->with('sheetDataCount', $service->getDataCount());
        });
    }
}
