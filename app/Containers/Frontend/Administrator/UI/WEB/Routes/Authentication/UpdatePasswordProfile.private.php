<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/perfil/actualizar/contrasena', [AuthenticationController::class, 'updatePasswordProfile'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_update_password_profile')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
