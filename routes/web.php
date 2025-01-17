<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

// Product Routes
Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
    Route::get('/', 'index')->name('index');              // List all products
    Route::get('/create', 'create')->name('create');      // Show create form
    Route::post('/', 'store')->name('store');             // Store new product
    Route::get('/{product}', 'show')->name('show');       // Show a single product
    Route::get('/{product}/edit', 'edit')->name('edit');  // Show edit form
    Route::put('/{product}', 'update')->name('update');   // Update product
    Route::delete('/{product}', 'destroy')->name('destroy'); // Delete product
});

// Shop Route (outside the group for clarity or access without 'products' prefix)
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
