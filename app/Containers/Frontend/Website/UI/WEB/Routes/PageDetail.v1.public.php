<?php

use App\Containers\Frontend\Website\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('registro-agresion/{id}/detalle', [Controller::class, 'detail'])
    ->name('web_detail');

