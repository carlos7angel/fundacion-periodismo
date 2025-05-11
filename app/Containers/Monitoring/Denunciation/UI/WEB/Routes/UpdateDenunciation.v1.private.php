<?php

use App\Containers\Monitoring\Denunciation\UI\WEB\Controllers\UpdateDenunciationController;
use Illuminate\Support\Facades\Route;

Route::patch('denunciations/{id}', [UpdateDenunciationController::class, 'update'])
    ->middleware(['auth:web']);

