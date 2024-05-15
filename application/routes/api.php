<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferenceController;

Route::prefix('/transfer')->group(function () {
    Route::post('/', [TransferenceController::class, 'postTransfer']);
});