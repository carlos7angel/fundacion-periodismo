<?php

use App\Containers\Monitoring\Denunciation\UI\WEB\Controllers\CreateDenunciationController;
use Illuminate\Support\Facades\Route;

Route::get('denunciations/create', [CreateDenunciationController::class, 'create'])
    ->middleware(['auth:web']);

