<?php

use App\Containers\AppSection\Catalog\UI\WEB\Controllers\UpdateCatalogController;
use Illuminate\Support\Facades\Route;

Route::patch('catalogs/{id}', [UpdateCatalogController::class, 'update'])
    ->middleware(['auth:web']);

