<?php

use App\Containers\AppSection\Localization\UI\WEB\Controllers\CreateLocalizationController;
use Illuminate\Support\Facades\Route;

Route::get('localizations/create', [CreateLocalizationController::class, 'create'])
    ->middleware(['auth:web']);

