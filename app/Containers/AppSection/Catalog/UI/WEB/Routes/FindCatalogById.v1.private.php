<?php

use App\Containers\AppSection\Catalog\UI\WEB\Controllers\FindCatalogByIdController;
use Illuminate\Support\Facades\Route;

Route::get('catalogs/{id}', [FindCatalogByIdController::class, 'show'])
    ->middleware(['auth:web']);

