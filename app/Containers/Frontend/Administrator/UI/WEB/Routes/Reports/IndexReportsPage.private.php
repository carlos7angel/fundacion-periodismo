<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes', [ReportsController::class, 'index'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_reports_index')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
