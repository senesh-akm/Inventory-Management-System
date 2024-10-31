@extends('layouts.app')

@section('title', 'Purchase Orders List')

@section('content')
<main class="mt-5">
    <h1>Purchase Orders List</h1>
    <div class="row">
        <div class="col text-right mt-3">
            <a href="{{ route('purchaseorders.create') }}" class="btn btn-primary">+ Add New Purchase Order</a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th style="width: 20%;">Purchase Order ID</th>
                <th style="width: 20%;">Supplier Code</th>
                <th style="width: 20%;">Item Code</th>
                <th style="width: 20%;">Order Date</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchaseorders as $purchaseorder)
                <tr>
                    <td>
                        <a href="{{ route('purchaseorders.show', $purchaseorder->PurchaseOrderID) }}" style="text-decoration: none; color: black;">
                            {{ $purchaseorder->PurchaseOrderID }}
                        </a>
                    </td>
                    <td>{{ $purchaseorder->SupplierCode }}</td>
                    <td>{{ $purchaseorder->ItemCode }}</td>
                    <td>{{ $purchaseorder->OrderDate }}</td>
                    <td>
                        <form action="{{ route('purchaseorders.destroy', $purchaseorder->PurchaseOrderID) }}" method="POST" style="display:inline-block;">
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
