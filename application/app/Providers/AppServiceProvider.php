<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TransferenceService;
use App\Http\Controllers\TransferenceController;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Contracts\PaymentGatewayContract::class, TransferenceController::class);
        $this->app->bind(\App\Contracts\PaymentGatewayContract::class, TransferenceService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
