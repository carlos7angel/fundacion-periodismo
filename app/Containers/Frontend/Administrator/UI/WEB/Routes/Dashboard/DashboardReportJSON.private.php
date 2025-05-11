<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes/por-numero-registros/json', [IndexController::class, 'dashboardJson'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_reports_by_dashboard_json')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
