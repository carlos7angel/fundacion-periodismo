<?php

use App\Containers\Monitoring\Denunciation\UI\WEB\Controllers\CreateDenunciationController;
use Illuminate\Support\Facades\Route;

Route::post('denunciations/store', [CreateDenunciationController::class, 'store'])
    ->middleware(['auth:web']);

