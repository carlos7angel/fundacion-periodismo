<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DenunciationController;
use Illuminate\Support\Facades\Route;

Route::get('/monitoreo/denuncias/{id}/detalle', [DenunciationController::class, 'detail'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_denunciation_detail')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
