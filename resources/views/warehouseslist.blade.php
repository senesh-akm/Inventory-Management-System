@extends('layouts.app')

@section('title', 'Warehouses List')

@section('content')
<main class="mt-5">
    <h1>Warehouses List</h1>

    <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Add New Warehouse</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th style="width: 20%;">Warehouse Code</th>
                <th style="width: 30%;">Warehouse Name</th>
                <th style="width: 30%;">Location</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warehouses as $warehouse)
                <tr>
                    <td>
                        <a href="{{ route('warehouses.show', $warehouse->WarehouseCode) }}" style="text-decoration: none; color: black;">
                            {{ $warehouse->WarehouseCode }}
                        </a>
                    </td>
                    <td>{{ $warehouse->WarehouseName }}</td>
                    <td>{{ $warehouse->Location }}</td>
                    <td>
                        <a href="{{ route('warehouses.edit', $warehouse->WarehouseCode) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('warehouses.destroy', $warehouse->WarehouseCode) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
