<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/informes/trimestrales', [DocumentController::class, 'listQuarterly'])
    ->prefix(config('appSection-authentication.login.prefix'))
    ->name('admin_document_list_quarterly')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
