@extends('layouts.app')

@section("title", isset($item) ? "Edit Item" : "Add Item")

@section('content')
    <main class="mt-5">
        <h1>{{ isset($item) ? 'Edit Item' : 'Create New Item' }}</h1>
        <form action="{{ isset($item) ? route('items.update', $item->ItemCode) : route('items.store') }}" method="POST">
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
                            <input type="text" class="form-control" id="ItemCode" name="ItemCode" value="{{ isset($item) ? $item->ItemCode : '' }}" {{ isset($item) ? 'readonly' : '' }}>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemName">Item Name</label>
                            <input type="text" class="form-control" id="ItemName" name="ItemName" value="{{ isset($item) ? $item->ItemName : '' }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProductCode">Product Code</label>
                            <input type="text" class="form-control" id="ProductCode" name="ProductCode" value="{{ isset($item) ? $item->ProductCode : '' }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="UnitPrice">Unit Price</label>
                            <input type="number" step="0.01" class="form-control" id="UnitPrice" name="UnitPrice" value="{{ isset($item) ? $item->UnitPrice : '' }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="Description">Description</label>
                            <textarea class="form-control" id="Description" name="Description">{{ isset($item) ? $item->Description : '' }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemSerial">Item Serial</label>
                            <input type="text" class="form-control" id="ItemSerial" name="ItemSerial" value="{{ isset($item) ? $item->ItemSerial : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
