<?php

use App\Http\Controllers\AdjestmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\StockLocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
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
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

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

// transactions module
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{TransactionCode}', [TransactionController::class, 'show'])->name('transactions.show');
Route::resource('transactions', TransactionController::class);

// sales orders module
Route::get('/salesorders', [SalesOrderController::class, 'index'])->name('salesorders.index');
Route::get('/salesorders/create', [SalesOrderController::class, 'create'])->name('salesorders.create');
Route::post('/salesorders', [SalesOrderController::class, 'store'])->name('salesorders.store');
Route::get('/salesorders/{SalesOrderID}', [SalesOrderController::class, 'show'])->name('salesorders.show');
Route::get('/items/{ItemCode}', [SalesOrderController::class, 'getItemDetails']);
Route::resource('salesorders', SalesOrderController::class);

// purchase orders module
Route::get('/purchaseorders', [PurchaseOrderController::class, 'index'])->name('purchaseorders.index');
Route::get('/purchaseorders/create', [PurchaseOrderController::class, 'create'])->name('purchaseorders.create');
Route::post('/purchaseorders', [PurchaseOrderController::class, 'store'])->name('purchaseorders.store');
Route::get('/purchaseorders/{PurchaseOrderID}', [PurchaseOrderController::class, 'show'])->name('purchaseorders.show');
Route::get('/items/{ItemCode}', [PurchaseOrderController::class, 'getItemDetails']);
Route::resource('purchaseorders', PurchaseOrderController::class);

// stock location module
Route::get('/stocklocations', [StockLocationController::class, 'index'])->name('stocklocations.index');
Route::get('/stocklocations/create', [StockLocationController::class, 'create'])->name('stocklocations.create');
Route::post('/stocklocations', [StockLocationController::class, 'store'])->name('stocklocations.store');
Route::get('/stocklocations/{WarehouseCode}', [StockLocationController::class, 'show'])->name('stocklocations.show');
Route::resource('stocklocations', StockLocationController::class);
