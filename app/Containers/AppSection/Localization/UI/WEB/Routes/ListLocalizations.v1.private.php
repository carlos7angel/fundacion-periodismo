<?php

use App\Containers\AppSection\Localization\UI\WEB\Controllers\ListLocalizationsController;
use Illuminate\Support\Facades\Route;

Route::get('localizations', [ListLocalizationsController::class, 'index'])
    ->middleware(['auth:web']);

