@extends('layouts.app')

@section('title', isset($stocklocation) ? 'Edit Stock Locations' : 'Create Stock Locations')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($stocklocation) ? 'Edit Stock Locations' : 'Create Stock Locations' }}</h1>
        <form action="{{ isset($stocklocation) ? route('stocklocations.update', $stocklocation->WarehouseCode) : route('stocklocations.store') }}" method="POST" novalidate>
            @csrf
            @if (isset($stocklocation))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success">{{ isset($stocklocation) ? 'Update Stock Locations' : 'Create Stock Locations' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="WarehouseCode">Warehouse Code</label>
                            <input type="text" class="form-control" id="WarehouseCode" name="WarehouseCode" value="{{ isset($stocklocation) ? $stocklocation->WarehouseCode : '' }}" required maxlength="25" oninput="this.value = this.value.toUpperCase()" placeholder="e.g.: WAREHOUSE-GMP-01" {{ isset($stocklocation) ? 'readonly' : '' }}>
                            <div class="invalid-feedback">Warehouse Code is required and should be a maximum of 5 letters.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProductCode">Product Code</label>
                            <select class="form-control" name="ProductCode" id="ProductCode" required>
                                <option value="">-- Select Product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->ProductCode }}" {{ (isset($stocklocation) && $stocklocation->ProductCode == $product->ProductCode) ? 'selected' : '' }}>
                                        {{ $product->ProductCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
