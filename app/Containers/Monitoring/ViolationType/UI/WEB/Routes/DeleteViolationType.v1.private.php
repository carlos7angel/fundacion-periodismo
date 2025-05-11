<?php

use App\Containers\Monitoring\ViolationType\UI\WEB\Controllers\DeleteViolationTypeController;
use Illuminate\Support\Facades\Route;

Route::delete('violation-types/{id}', [DeleteViolationTypeController::class, 'destroy'])
    ->middleware(['auth:web']);

