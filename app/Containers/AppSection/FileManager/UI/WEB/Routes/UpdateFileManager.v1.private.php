<?php

use App\Containers\AppSection\FileManager\UI\WEB\Controllers\UpdateFileManagerController;
use Illuminate\Support\Facades\Route;

Route::patch('file-managers/{id}', [UpdateFileManagerController::class, 'update'])
    ->middleware(['auth:web']);

