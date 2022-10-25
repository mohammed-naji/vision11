<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('home', function() { return 'Admin home'; })->name('home');
    Route::get('products', function() { return 'Admin products'; })->name('products');
    Route::get('orders', function() { return 'Admin orders'; })->name('orders');
    Route::get('categories', function() { return 'Admin categories'; })->name('categories');
    Route::get('statistics', function() { return 'Admin statistics'; })->name('statistics');
    Route::get('users', function() { return 'Admin users'; })->name('users');
});
