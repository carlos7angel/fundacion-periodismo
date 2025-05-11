<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticationController::class, 'postLogin'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_post_login')
    ->domain(parse_url(config('app.admin_url'))['host'])
;
