<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', [IndexController::class, 'showIndexPage'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_show_index')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);

Route::get('/admin', [IndexController::class, 'showIndexPage'])
    // ->prefix(config('app.admin_url_prefix'))
    ->name('admin_show_index_root')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);