@extends('layouts.app')

@section('title', 'Stock Locations List')

@section('content')
<main class="mt-5">
    <h1>Stock Locations List</h1>
    <div class="row">
        <div class="col text-right mt-3">
            <a href="{{ route('stocklocations.create') }}" class="btn btn-primary">+ Add New Stock Location</a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th style="width: 30%;">Warehouse Code</th>
                <th style="width: 50%;">Product Code</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocklocations as $stocklocation)
                <tr>
                    <td>
                        <a href="{{ route('stocklocations.show', $stocklocation->WarehouseCode) }}" style="text-decoration: none; color: black;">
                            {{ $stocklocation->WarehouseCode }}
                        </a>
                    </td>
                    <td>{{ $stocklocation->ProductCode }}</td>
                    <td>
                        <a href="{{ route('stocklocations.edit', $stocklocation->WarehouseCode) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('stocklocations.destroy', $stocklocation->WarehouseCode) }}" method="POST" style="display:inline-block;">
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
