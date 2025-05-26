<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticationController::class, 'showLoginPage'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_show_login')
    ->domain(parse_url(config('app.admin_url'))['host']);
