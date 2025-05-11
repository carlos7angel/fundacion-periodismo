<?php

use App\Containers\Monitoring\ViolationType\UI\WEB\Controllers\UpdateViolationTypeController;
use Illuminate\Support\Facades\Route;

Route::patch('violation-types/{id}', [UpdateViolationTypeController::class, 'update'])
    ->middleware(['auth:web']);

