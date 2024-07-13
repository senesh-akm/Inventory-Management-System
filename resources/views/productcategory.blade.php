@extends('layouts.app')

@section("title", isset($productCategory) ? "Edit Product Category" : "Add Product Category")

@section('content')
    <main class="mt-5">
        <h2>{{ isset($productCategory) ? "Edit Product Category" : "Add Product Category" }}</h2>
        <form action="{{ isset($productCategory) ? route('productCategories.update', $productCategory->CategorName) : route('productCategories.store') }}" method="POST">
            @csrf
            @if(isset($productCategory))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-primary mt-3">{{ isset($productCategory) ? 'Update' : 'Submit' }}</button>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="CategorName">Product Category</label>
                                <input type="text" class="form-control" id="CategorName" name="CategorName" value="{{ isset($productCategory) ? $productCategory->CategorName : '' }}" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="Description">Description</label>
                                <input type="text" class="form-control" id="Description" name="Description" value="{{ isset($productCategory) ? $productCategory->Description : '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
