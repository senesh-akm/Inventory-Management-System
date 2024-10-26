@extends('layouts.app')

@section('title', isset($stocklocation) ? 'Edit Stock Locations' : 'Create Stock Locations')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($stocklocation) ? 'Edit Stock Locations' : 'Create Stock Locations' }}</h1>
        <form action="{{ isset($stocklocation) ? route('stocklocations.update', $stocklocation->WarehouseCode) : route('stocklocations.store') }}" method="POST">
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
                            <input type="text" class="form-control" id="WarehouseCode" name="WarehouseCode" value="{{ isset($stocklocation) ? $stocklocation->WarehouseCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProductCode">Product Code</label>
                            <input type="text" class="form-control" id="ProductCode" name="ProductCode" value="{{ isset($stocklocation) ? $stocklocation->ProductCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Qty">Quantity</label>
                            <input type="text" class="form-control" id="Qty" name="Qty" value="{{ isset($stocklocation) ? $stocklocation->Qty : '' }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
