<?php

use App\Containers\Monitoring\Denunciation\UI\WEB\Controllers\FindDenunciationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('denunciations/{id}', [FindDenunciationByIdController::class, 'show'])
    ->middleware(['auth:web']);

