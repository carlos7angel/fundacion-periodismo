<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticationController::class, 'postLogin'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_post_login')
    ->domain(parse_url(config('app.admin_url'))['host'])
;
