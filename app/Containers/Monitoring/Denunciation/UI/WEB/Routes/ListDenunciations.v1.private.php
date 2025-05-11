<?php

use App\Containers\Monitoring\Denunciation\UI\WEB\Controllers\ListDenunciationsController;
use Illuminate\Support\Facades\Route;

Route::get('denunciations', [ListDenunciationsController::class, 'index'])
    ->middleware(['auth:web']);

