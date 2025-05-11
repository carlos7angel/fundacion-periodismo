<?php

use App\Containers\AppSection\Catalog\UI\WEB\Controllers\CreateCatalogController;
use Illuminate\Support\Facades\Route;

Route::post('catalogs/store', [CreateCatalogController::class, 'store'])
    ->middleware(['auth:web']);

