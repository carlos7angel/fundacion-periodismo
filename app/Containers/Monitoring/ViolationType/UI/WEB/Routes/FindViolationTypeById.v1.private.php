<?php

use App\Containers\Monitoring\ViolationType\UI\WEB\Controllers\FindViolationTypeByIdController;
use Illuminate\Support\Facades\Route;

Route::get('violation-types/{id}', [FindViolationTypeByIdController::class, 'show'])
    ->middleware(['auth:web']);

