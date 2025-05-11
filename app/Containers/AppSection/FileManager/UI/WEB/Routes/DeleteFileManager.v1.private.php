<?php

use App\Containers\AppSection\FileManager\UI\WEB\Controllers\DeleteFileManagerController;
use Illuminate\Support\Facades\Route;

Route::delete('file-managers/{id}', [DeleteFileManagerController::class, 'destroy'])
    ->middleware(['auth:web']);

