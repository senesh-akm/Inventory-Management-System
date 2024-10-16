<?php

use App\Http\Controllers\AdjestmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

// dashboard
Route::middleware('auth')->group(function () {
    Route::view('/', 'dashboard')->name('home');
});

// authentication page
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// customer module
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{Customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::resource('customers', CustomerController::class);

// supplier module
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{Supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::resource('suppliers', SupplierController::class);

// product module
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// product category module
Route::get('/productCategories', [CategoryController::class, 'index'])->name('productCategories.index');
Route::get('/productCategories/create', [CategoryController::class, 'create'])->name('productCategories.create');
Route::post('/productCategories', [CategoryController::class, 'store'])->name('productCategories.store');
Route::get('/productCategories/{CategorName}', [CategoryController::class, 'show'])->name('productCategories.show');
Route::resource('productCategories', CategoryController::class);

// items module
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{ItemCode}', [ItemController::class, 'show'])->name('items.show');
Route::resource('items', ItemController::class);

// warehouse module
Route::get('/warehouses', [WarehouseController::class, 'index'])->name('warehouses.index');
Route::get('/warehouses/create', [WarehouseController::class, 'create'])->name('warehouses.create');
Route::post('/warehouses', [WarehouseController::class, 'store'])->name('warehouses.store');
Route::get('/warehouses/{WarehouseCode}', [WarehouseController::class, 'show'])->name('warehouses.show');
Route::resource('warehouses', WarehouseController::class);

// adjestments module
Route::get('/adjestments', [AdjestmentController::class, 'index'])->name('adjestments.index');
Route::get('/adjestments/create', [AdjestmentController::class, 'create'])->name('adjestments.create');
Route::post('/adjestments', [AdjestmentController::class, 'store'])->name('adjestments.store');
Route::get('/adjestments/{ReturnCode}', [AdjestmentController::class, 'show'])->name('adjestments.show');
Route::resource('adjestments', AdjestmentController::class);
