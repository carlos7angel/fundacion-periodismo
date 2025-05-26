<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/olvidaste-tu-contrasena', [AuthenticationController::class, 'postForgotPassword'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_post_forgot_password')
    ->domain(parse_url(config('app.admin_url'))['host']);
