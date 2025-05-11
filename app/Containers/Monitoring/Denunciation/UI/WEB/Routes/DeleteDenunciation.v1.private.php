<?php

use App\Containers\Monitoring\Denunciation\UI\WEB\Controllers\DeleteDenunciationController;
use Illuminate\Support\Facades\Route;

Route::delete('denunciations/{id}', [DeleteDenunciationController::class, 'destroy'])
    ->middleware(['auth:web']);

