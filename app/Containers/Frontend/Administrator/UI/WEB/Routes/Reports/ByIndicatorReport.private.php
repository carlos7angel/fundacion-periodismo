<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes/indicador/{id}', [ReportsController::class, 'byIndicator'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_reports_by_indicator')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
