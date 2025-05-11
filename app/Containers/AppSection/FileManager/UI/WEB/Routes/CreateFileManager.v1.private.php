<?php

use App\Containers\AppSection\FileManager\UI\WEB\Controllers\CreateFileManagerController;
use Illuminate\Support\Facades\Route;

Route::get('file-managers/create', [CreateFileManagerController::class, 'create'])
    ->middleware(['auth:web']);

