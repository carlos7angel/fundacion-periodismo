<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/restablecer-contrasena', [AuthenticationController::class, 'showResetPasswordPage'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_reset_password')
    ->domain(parse_url(config('app.admin_url'))['host']);
