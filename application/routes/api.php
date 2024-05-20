<?php

use App\Http\Controllers\API\TransferenceController;
use Illuminate\Support\Facades\Route;

Route::get('/transference', [TransferenceController::class, 'show']);
Route::post('/transference', [TransferenceController::class, 'postTransference']);
