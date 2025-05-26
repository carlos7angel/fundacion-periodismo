<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::post('/informes/anuales/guardar', [DocumentController::class, 'store'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_document_store')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
