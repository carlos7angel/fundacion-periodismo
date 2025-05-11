<?php

use App\Containers\Monitoring\ViolationType\UI\WEB\Controllers\CreateViolationTypeController;
use Illuminate\Support\Facades\Route;

Route::post('violation-types/store', [CreateViolationTypeController::class, 'store'])
    ->middleware(['auth:web']);

