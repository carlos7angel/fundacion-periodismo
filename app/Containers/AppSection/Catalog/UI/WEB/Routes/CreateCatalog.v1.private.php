<?php

use App\Containers\AppSection\Catalog\UI\WEB\Controllers\CreateCatalogController;
use Illuminate\Support\Facades\Route;

Route::get('catalogs/create', [CreateCatalogController::class, 'create'])
    ->middleware(['auth:web']);

