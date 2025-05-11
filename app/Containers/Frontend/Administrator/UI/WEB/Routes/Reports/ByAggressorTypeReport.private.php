<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes/por-tipo-de-agresor', [ReportsController::class, 'byAggressorType'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_reports_by_aggressor_type')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
