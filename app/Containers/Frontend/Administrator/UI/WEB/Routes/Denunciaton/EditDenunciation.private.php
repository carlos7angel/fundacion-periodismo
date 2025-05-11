<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DenunciationController;
use Illuminate\Support\Facades\Route;

Route::get('/monitoreo/denuncias/{id}/editar', [DenunciationController::class, 'edit'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_denunciation_edit')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
