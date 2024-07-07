@extends('layouts.app')

@section("title", "Supplier List")

@section('content')
    <main class="mt-5">
        <h2>Suppliers List</h2>
        <div class="row">
            <div class="col text-right mt-3">
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary">+ Add Supplier</a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th style="width: 20%;">Supplier Code</th>
                    <th style="width: 80%;">Supplier Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td style="text-decoration: none; color: black;">{{ $supplier->SupplierCode }}</td>
                        <td>
                            <a href="{{ route('suppliers.show', $supplier->id) }}" style="text-decoration: none; color: black;">
                                {{ $supplier->SupplierName }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
