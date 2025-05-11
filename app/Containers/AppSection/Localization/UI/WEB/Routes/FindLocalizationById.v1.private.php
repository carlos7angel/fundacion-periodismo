<?php

use App\Containers\AppSection\Localization\UI\WEB\Controllers\FindLocalizationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('localizations/{id}', [FindLocalizationByIdController::class, 'show'])
    ->middleware(['auth:web']);

