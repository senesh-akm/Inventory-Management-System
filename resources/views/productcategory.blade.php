@extends('layouts.app')

@section("title", isset($productCategory) ? "Edit Product Category" : "Add Product Category")

@section('content')
    <main class="mt-5">
        <h2>{{ isset($productCategory) ? "Edit Product Category" : "Add Product Category" }}</h2>
        <form action="{{ isset($productCategory) ? route('productCategories.update', $productCategory->CategorName) : route('productCategories.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($productCategory))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success mt-3">{{ isset($productCategory) ? 'Update Category' : 'Add Category' }}</button>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CategorName">Product Category</label>
                                <input type="text" class="form-control" id="CategorName" name="CategorName" value="{{ isset($productCategory) ? $productCategory->CategorName : '' }}" required placeholder="e.g.: Mobile Phones"  {{ isset($productCategory) ? 'readonly' : '' }}>
                                <div class="invalid-feedback">Product category is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Description">Description</label>
                                <input type="text" class="form-control" id="Description" name="Description" value="{{ isset($productCategory) ? $productCategory->Description : '' }}" required placeholder="e.g.: Description for mobile phones">
                                <div class="invalid-feedback">Description is required.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
