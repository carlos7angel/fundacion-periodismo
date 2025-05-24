<?php

use App\Containers\Monitoring\Report\UI\WEB\Controllers\ListReportsController;
use Illuminate\Support\Facades\Route;

Route::get('reports', [ListReportsController::class, 'index'])
    ->middleware(['auth:web']);

