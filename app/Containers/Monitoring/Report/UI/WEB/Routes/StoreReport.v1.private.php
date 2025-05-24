<?php

use App\Containers\Monitoring\Report\UI\WEB\Controllers\CreateReportController;
use Illuminate\Support\Facades\Route;

Route::post('reports/store', [CreateReportController::class, 'store'])
    ->middleware(['auth:web']);

