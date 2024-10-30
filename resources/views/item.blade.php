@extends('layouts.app')

@section("title", isset($item) ? "Edit Item" : "Add Item")

@section('content')
    <main class="mt-5">
        <h1>{{ isset($item) ? 'Edit Item' : 'Create New Item' }}</h1>
        <form action="{{ isset($item) ? route('items.update', $item->ItemCode) : route('items.store') }}" method="POST" novalidate>
            @csrf
            @if (isset($item))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success">{{ isset($item) ? 'Update Item' : 'Create Item' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="ItemCode">Item Code</label>
                            <input type="text" class="form-control" id="ItemCode" name="ItemCode" value="{{ isset($item) ? $item->ItemCode : '' }}" required oninput="this.value = this.value.toUpperCase()" placeholder="e.g.: APPLE-IPHONE-16-PRO-MAX" {{ isset($item) ? 'readonly' : '' }}>
                            <div class="invalid-feedback">Item code is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemName">Item Name</label>
                            <input type="text" class="form-control" id="ItemName" name="ItemName" value="{{ isset($item) ? $item->ItemName : '' }}" required placeholder="e.g.: Apple iPhone 16 Pro Max">
                            <div class="invalid-feedback">Item name is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProductCode">Product Code</label>
                            <select class="form-control" name="ProductCode" id="ProductCode" required>
                                <option value="">-- Select Product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->ProductCode }}" {{ (isset($item) && $item->ProductCode == $product->ProductCode) ? 'selected' : '' }}>
                                        {{ $product->ProductCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="UnitPrice">Unit Price (LKR)</label>
                            <input type="number" step="0.01" class="form-control" id="UnitPrice" name="UnitPrice" value="{{ isset($item) ? $item->UnitPrice : '' }}" required placeholder="e.g.: 638000">
                            <div class="invalid-feedback">Unit price is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Description">Description</label>
                            <textarea class="form-control" id="Description" name="Description" required placeholder="e.g.: 32GB RAM | 256 GB SSD | Black | 2024 | 2 years warrenty">{{ isset($item) ? $item->Description : '' }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemSerial">Item Serial</label>
                            <input type="text" class="form-control" id="ItemSerial" name="ItemSerial" value="{{ isset($item) ? $item->ItemSerial : '' }}" required placeholder="e.g.: AP554571455">
                            <div class="invalid-feedback">Item serial is required.</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
