<?php

use App\Containers\AppSection\Settings\UI\WEB\Controllers\ListSettingsController;
use Illuminate\Support\Facades\Route;

Route::get('settings', [ListSettingsController::class, 'index'])
    ->middleware(['auth:web']);

