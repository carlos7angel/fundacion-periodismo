<?php

use App\Containers\AppSection\Localization\UI\WEB\Controllers\CreateLocalizationController;
use Illuminate\Support\Facades\Route;

Route::post('localizations/store', [CreateLocalizationController::class, 'store'])
    ->middleware(['auth:web']);

