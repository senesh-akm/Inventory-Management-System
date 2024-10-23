@extends('layouts.app')

@section('title', isset($warehouse) ? 'Edit Warehouse' : 'Create Warehouse')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($warehouse) ? 'Edit Warehouse' : 'Create Warehouse' }}</h1>
        <form action="{{ isset($warehouse) ? route('warehouses.update', $warehouse->WarehouseCode) : route('warehouses.store') }}" method="POST">
            @csrf
            @if (isset($warehouse))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success">{{ isset($warehouse) ? 'Update Warehouse' : 'Create Warehouse' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="WarehouseCode">Warehouse Code</label>
                            <input type="text" class="form-control" id="WarehouseCode" name="WarehouseCode" value="{{ isset($warehouse) ? $warehouse->WarehouseCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="WarehouseName">Warehouse Name</label>
                            <input type="text" class="form-control" id="WarehouseName" name="WarehouseName" value="{{ isset($warehouse) ? $warehouse->WarehouseName : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Location">Location</label>
                            <input type="text" class="form-control" id="Location" name="Location" value="{{ isset($warehouse) ? $warehouse->Location : '' }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
