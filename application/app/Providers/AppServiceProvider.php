<?php

namespace App\Providers;

use App\Http\Controllers\API\TransferenceController;
use App\Services\TransferenceService;
use Illuminate\Support\ServiceProvider;


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
