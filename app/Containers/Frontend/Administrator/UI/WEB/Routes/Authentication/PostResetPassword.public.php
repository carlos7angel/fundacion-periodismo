<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/restablecer-contrasena', [AuthenticationController::class, 'postResetPassword'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_post_reset_password')
    ->domain(parse_url(config('app.admin_url'))['host']);
