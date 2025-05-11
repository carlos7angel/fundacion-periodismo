<?php

use App\Containers\AppSection\Localization\UI\WEB\Controllers\UpdateLocalizationController;
use Illuminate\Support\Facades\Route;

Route::get('localizations/{id}/edit', [UpdateLocalizationController::class, 'edit'])
    ->middleware(['auth:web']);

