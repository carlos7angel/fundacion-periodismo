<?php

use App\Containers\AppSection\Localization\UI\WEB\Controllers\UpdateLocalizationController;
use Illuminate\Support\Facades\Route;

Route::patch('localizations/{id}', [UpdateLocalizationController::class, 'update'])
    ->middleware(['auth:web']);

