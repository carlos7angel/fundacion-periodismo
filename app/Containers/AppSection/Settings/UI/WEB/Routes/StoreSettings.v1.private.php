<?php

use App\Containers\AppSection\Settings\UI\WEB\Controllers\CreateSettingsController;
use Illuminate\Support\Facades\Route;

Route::post('settings/store', [CreateSettingsController::class, 'store'])
    ->middleware(['auth:web']);

