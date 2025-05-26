<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/logout', [AuthenticationController::class, 'postLogout'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_post_logout')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
