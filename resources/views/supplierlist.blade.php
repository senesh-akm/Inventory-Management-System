@extends('layouts.app')

@section("title", "Supplier List")

@section('content')
    <main class="mt-5">
        <h2>Supplier List</h2>
        <div class="row">
            <div class="col text-right mt-3">
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary">+ Add Supplier</a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th style="width: 20%;">Supplier Code</th>
                    <th style="width: 60%;">Supplier Name</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>
                            <a href="{{ route('suppliers.show', $supplier->id) }}" style="text-decoration: none; color: black;">
                                {{ $supplier->SupplierCode }}
                            </a>
                        </td>
                        <td>{{ $supplier->Supplier }}</td>
                        <td>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
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
