<?php

use App\Containers\AppSection\Localization\UI\WEB\Controllers\DeleteLocalizationController;
use Illuminate\Support\Facades\Route;

Route::delete('localizations/{id}', [DeleteLocalizationController::class, 'destroy'])
    ->middleware(['auth:web']);

