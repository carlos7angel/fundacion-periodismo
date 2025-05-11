<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/reportes/por-tipo-de-victima/json', [ReportsController::class, 'byVictimTypeJson'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_reports_by_victim_type_json')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
