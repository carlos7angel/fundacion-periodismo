<?php

use App\Containers\AppSection\Settings\UI\WEB\Controllers\UpdateSettingsController;
use Illuminate\Support\Facades\Route;

Route::get('settings/{id}/edit', [UpdateSettingsController::class, 'edit'])
    ->middleware(['auth:web']);

