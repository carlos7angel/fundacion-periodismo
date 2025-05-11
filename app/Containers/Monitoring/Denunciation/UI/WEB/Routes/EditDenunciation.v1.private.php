<?php

use App\Containers\Monitoring\Denunciation\UI\WEB\Controllers\UpdateDenunciationController;
use Illuminate\Support\Facades\Route;

Route::get('denunciations/{id}/edit', [UpdateDenunciationController::class, 'edit'])
    ->middleware(['auth:web']);

