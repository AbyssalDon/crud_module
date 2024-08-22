<?php

use Illuminate\Support\Facades\Route;
use Abbas\CrudModule\ProductController;

Route::resource('products', ProductController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
	->middleware(['web', 'auth', 'verified']);