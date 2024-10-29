@extends('layouts.app')

@section("title", isset($product) ? "Edit Product" : "Add Product")

@section('content')
    <main class="mt-5">
        <h2>{{ isset($product) ? "Edit Product" : "Add Product" }}</h2>
        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success mt-3">{{ isset($product) ? 'Update Product' : 'Add Product' }}</button>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="ProductCode">Product Code</label>
                                <input type="text" class="form-control" id="ProductCode" name="ProductCode" value="{{ isset($product) ? $product->ProductCode : '' }}" required oninput="this.value = this.value.toUpperCase()" placeholder="e.g.: APPLE-IPHONE" {{ isset($product) ? 'readonly' : '' }}>
                                <div class="invalid-feedback">Customer Code is required and should be a maximum of 50 letters.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="ProductName">Product Name</label>
                                <input type="text" class="form-control" id="ProductName" name="ProductName" value="{{ isset($product) ? $product->ProductName : '' }}" required placeholder="e.g.: Apple iPhone">
                                <div class="invalid-feedback">Product name is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="Description">Description</label>
                                <input type="text" class="form-control" id="Description" name="Description" value="{{ isset($product) ? $product->Description : '' }}" minlength="10" maxlength="255">
                                <small class="form-text text-muted">Description should be between 10 and 255 characters and contain only letters, numbers, and spaces.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="ProductCategory">Product Category</label>
                                <select class="form-control" name="ProductCategory" id="ProductCategory" required>
                                    <option value="">-- Select Product Category --</option>
                                    @foreach($productCategories as $category)
                                        <option value="{{ $category->CategorName }}" {{ (isset($product) && $product->ProductCategory == $category->CategorName) ? 'selected' : '' }}>
                                            {{ $category->CategorName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="SupplierName">Supplier Name</label>
                                <select class="form-control" id="SupplierName" name="SupplierName" required>
                                    <option value="">-- Select Supplier --</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->Supplier }}" {{ (isset($product) && $product->SupplierName == $supplier->Supplier) ? 'selected' : '' }}>
                                            {{ $supplier->Supplier }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
