<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DenunciationController;
use Illuminate\Support\Facades\Route;

Route::post('/monitoreo/denuncias/json', [DenunciationController::class, 'listJsonDt'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_denunciation_list_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
