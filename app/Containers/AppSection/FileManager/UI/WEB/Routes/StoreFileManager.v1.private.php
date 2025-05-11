<?php

use App\Containers\AppSection\FileManager\UI\WEB\Controllers\CreateFileManagerController;
use Illuminate\Support\Facades\Route;

Route::post('file-managers/store', [CreateFileManagerController::class, 'store'])
    ->middleware(['auth:web']);

