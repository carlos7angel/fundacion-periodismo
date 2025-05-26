<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes/por-tipo-de-agresion', [ReportsController::class, 'byViolationType'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_reports_by_violation_type')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
