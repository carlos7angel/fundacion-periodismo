<?php

use App\Containers\Frontend\Website\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('categoria/{category_id}/{category_name}', [Controller::class, 'listByCategory'])
    ->name('web_list_by_category');

