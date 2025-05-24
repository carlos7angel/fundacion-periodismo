<?php

use App\Containers\Monitoring\Report\UI\WEB\Controllers\UpdateReportController;
use Illuminate\Support\Facades\Route;

Route::patch('reports/{id}', [UpdateReportController::class, 'update'])
    ->middleware(['auth:web']);

