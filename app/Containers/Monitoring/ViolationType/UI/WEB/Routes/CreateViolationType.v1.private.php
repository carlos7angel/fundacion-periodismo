<?php

use App\Containers\Monitoring\ViolationType\UI\WEB\Controllers\CreateViolationTypeController;
use Illuminate\Support\Facades\Route;

Route::get('violation-types/create', [CreateViolationTypeController::class, 'create'])
    ->middleware(['auth:web']);

