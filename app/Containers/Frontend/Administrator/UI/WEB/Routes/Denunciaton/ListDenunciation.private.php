<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DenunciationController;
use Illuminate\Support\Facades\Route;

Route::get('/monitoreo/denuncias', [DenunciationController::class, 'list'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_denunciation_list')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
