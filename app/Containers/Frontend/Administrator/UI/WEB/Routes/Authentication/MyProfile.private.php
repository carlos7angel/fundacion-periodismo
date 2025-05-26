<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/perfil', [AuthenticationController::class, 'myProfile'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_my_profile')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
