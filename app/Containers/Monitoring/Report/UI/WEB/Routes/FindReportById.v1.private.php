<?php

use App\Containers\Monitoring\Report\UI\WEB\Controllers\FindReportByIdController;
use Illuminate\Support\Facades\Route;

Route::get('reports/{id}', [FindReportByIdController::class, 'show'])
    ->middleware(['auth:web']);

