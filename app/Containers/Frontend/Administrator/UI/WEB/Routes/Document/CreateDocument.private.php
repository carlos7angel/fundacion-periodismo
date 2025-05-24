<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/informes/nuevo', [DocumentController::class, 'create'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_document_create')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
