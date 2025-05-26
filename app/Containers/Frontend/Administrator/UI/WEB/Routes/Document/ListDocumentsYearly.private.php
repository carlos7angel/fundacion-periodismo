<?php

use App\Containers\Frontend\Administrator\UI\WEB\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/informes/anuales', [DocumentController::class, 'listYearly'])
    ->prefix(config('app.admin_url_prefix'))
    ->name('admin_document_list_yearly')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.admin_url'))['host']);
