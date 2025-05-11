<?php

use App\Containers\Monitoring\ViolationType\UI\WEB\Controllers\UpdateViolationTypeController;
use Illuminate\Support\Facades\Route;

Route::get('violation-types/{id}/edit', [UpdateViolationTypeController::class, 'edit'])
    ->middleware(['auth:web']);

