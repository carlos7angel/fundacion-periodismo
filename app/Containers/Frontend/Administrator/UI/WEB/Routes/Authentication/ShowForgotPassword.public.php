<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/olvidaste-tu-contrasena', [AuthenticationController::class, 'showForgotPasswordPage'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_forgot_password')
    ->domain(parse_url(config('app.admin_url'))['host']);
