<?php

use App\Containers\Monitoring\Report\UI\WEB\Controllers\CreateReportController;
use Illuminate\Support\Facades\Route;

Route::get('reports/create', [CreateReportController::class, 'create'])
    ->middleware(['auth:web']);

