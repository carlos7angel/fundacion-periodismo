<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DenunciationController;
use Illuminate\Support\Facades\Route;

Route::post('/monitoreo/denuncias/nuevo', [DenunciationController::class, 'store'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_denunciation_store')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
