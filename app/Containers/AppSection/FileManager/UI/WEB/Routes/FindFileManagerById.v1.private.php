<?php

use App\Containers\AppSection\FileManager\UI\WEB\Controllers\FindFileManagerByIdController;
use Illuminate\Support\Facades\Route;

Route::get('file-managers/{id}', [FindFileManagerByIdController::class, 'show'])
    ->middleware(['auth:web']);

