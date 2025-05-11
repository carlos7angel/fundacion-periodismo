<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes/indicador/{id}/json', [ReportsController::class, 'byIndicatorJson'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_reports_by_indicator_json')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
