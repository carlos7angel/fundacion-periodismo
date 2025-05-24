<?php

use App\Containers\Monitoring\Report\UI\WEB\Controllers\DeleteReportController;
use Illuminate\Support\Facades\Route;

Route::delete('reports/{id}', [DeleteReportController::class, 'destroy'])
    ->middleware(['auth:web']);

