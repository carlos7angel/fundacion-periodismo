<?php

use App\Containers\Monitoring\Report\UI\WEB\Controllers\UpdateReportController;
use Illuminate\Support\Facades\Route;

Route::get('reports/{id}/edit', [UpdateReportController::class, 'edit'])
    ->middleware(['auth:web']);

