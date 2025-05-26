<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes/por-tipo-de-agresion/json', [ReportsController::class, 'byViolationTypeJson'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_reports_by_violation_type_json')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
