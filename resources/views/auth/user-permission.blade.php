@extends('layouts.default')

@section('title', isset($permission) ? 'Update User Permissions' : 'Add User Permissions')

@section('content')
    <main class="mt-5">
        <h1>{{ isset($permission) ? 'Update User Permissions' : 'Add User Permissions' }}</h1>
        <form action="{{ isset($permission) ? route('permissions.update', $permission->ReturnCode) : route('permissions.store') }}" method="POST">
            @csrf
            @if (isset($permission))
                @method('PUT')
            @endif
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dashboard" id="dashboard" checked>
                            <label class="form-check-label" for="dashboard">Dashboard</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="adjestment" id="adjestment">
                            <label class="form-check-label" for="adjestment">Adjestment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="customer" id="customer">
                            <label class="form-check-label" for="customer">Customer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="supplier" id="supplier">
                            <label class="form-check-label" for="supplier">Supplier</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="item" id="item">
                            <label class="form-check-label" for="item">Item</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="products" id="products">
                            <label class="form-check-label" for="products">Products</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="product_category" id="product_category">
                            <label class="form-check-label" for="product_category">Product Category</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="product" id="product">
                            <label class="form-check-label" for="product">Product</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="purchase_order" id="purchase_order">
                            <label class="form-check-label" for="purchase_order">Purchase Order</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sales_order" id="sales_order">
                            <label class="form-check-label" for="sales_order">Sales Order</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="store" id="store">
                            <label class="form-check-label" for="store">Store</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="warehouse" id="warehouse">
                            <label class="form-check-label" for="warehouse">Warehouse</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="stock_location" id="stock_location">
                            <label class="form-check-label" for="stock_location">Stock Location</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="transaction" id="transaction">
                            <label class="form-check-label" for="transaction">Transaction</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="settings" id="settings">
                            <label class="form-check-label" for="settings">Settings</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="users" id="users">
                            <label class="form-check-label" for="users">Users</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="theme" id="theme">
                            <label class="form-check-label" for="theme">Themes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reports" id="reports">
                            <label class="form-check-label" for="reports">Reports</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sales_report" id="sales_report">
                            <label class="form-check-label" for="sales_report">Sales Report</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sales_report" id="sales_report">
                            <label class="form-check-label" for="purchase_report">Purchase Report</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
