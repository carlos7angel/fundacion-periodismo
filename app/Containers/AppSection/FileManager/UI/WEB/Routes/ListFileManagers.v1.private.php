<?php

use App\Containers\AppSection\FileManager\UI\WEB\Controllers\ListFileManagersController;
use Illuminate\Support\Facades\Route;

Route::get('file-managers', [ListFileManagersController::class, 'index'])
    ->middleware(['auth:web']);

