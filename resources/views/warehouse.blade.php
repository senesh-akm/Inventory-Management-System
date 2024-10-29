@extends('layouts.app')

@section('title', isset($warehouse) ? 'Edit Warehouse' : 'Create Warehouse')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($warehouse) ? 'Edit Warehouse' : 'Create Warehouse' }}</h1>
        <form action="{{ isset($warehouse) ? route('warehouses.update', $warehouse->WarehouseCode) : route('warehouses.store') }}" method="POST" novalidate>
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
                            <select class="form-control" name="WarehouseCode" id="WarehouseCode" required>
                                <option value="">-- Select Warehouse --</option>
                                @foreach($stocklocations as $stocklocation)
                                    <option value="{{ $stocklocation->WarehouseCode }}" {{ (isset($warehouse) && $warehouse->WarehouseCode == $stocklocation->WarehouseCode) ? 'selected' : '' }}>
                                        {{ $stocklocation->WarehouseCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="WarehouseName">Warehouse Name</label>
                            <input type="text" class="form-control" id="WarehouseName" name="WarehouseName" value="{{ isset($warehouse) ? $warehouse->WarehouseName : '' }}" required>
                            <div class="invalid-feedback">Warehouse name is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Location">Location</label>
                            <input type="text" class="form-control" id="Location" name="Location" value="{{ isset($warehouse) ? $warehouse->Location : '' }}" required>
                            <div class="invalid-feedback">Location is required.</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
