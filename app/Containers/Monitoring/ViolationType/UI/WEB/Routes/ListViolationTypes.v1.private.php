<?php

use App\Containers\Monitoring\ViolationType\UI\WEB\Controllers\ListViolationTypesController;
use Illuminate\Support\Facades\Route;

Route::get('violation-types', [ListViolationTypesController::class, 'index'])
    ->middleware(['auth:web']);

