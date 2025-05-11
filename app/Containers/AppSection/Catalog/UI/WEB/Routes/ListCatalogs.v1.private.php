<?php

use App\Containers\AppSection\Catalog\UI\WEB\Controllers\ListCatalogsController;
use Illuminate\Support\Facades\Route;

Route::get('catalogs', [ListCatalogsController::class, 'index'])
    ->middleware(['auth:web']);

