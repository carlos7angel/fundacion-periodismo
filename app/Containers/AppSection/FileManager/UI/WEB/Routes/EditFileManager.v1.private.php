<?php

use App\Containers\AppSection\FileManager\UI\WEB\Controllers\UpdateFileManagerController;
use Illuminate\Support\Facades\Route;

Route::get('file-managers/{id}/edit', [UpdateFileManagerController::class, 'edit'])
    ->middleware(['auth:web']);

