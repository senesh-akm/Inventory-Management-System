@extends('layouts.app')

@section("title", isset($transaction) ? "Edit Transaction" : "Add Transaction")

@section('content')
    <main class="mt-5">
        <h1>{{ isset($transaction) ? 'Edit Transaction' : 'Create New Transaction' }}</h1>
        <form action="{{ isset($transaction) ? route('transactions.update', $transaction->TransactionCode) : route('transactions.store') }}" method="POST">
            @csrf
            @if (isset($transaction))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success">{{ isset($transaction) ? 'Update Transaction' : 'Create Transaction' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="TransactionCode">Transaction Code</label>
                            <input type="text" class="form-control" id="TransactionCode" name="TransactionCode" value="{{ isset($transaction) ? $transaction->TransactionCode : '' }}" {{ isset($transaction) ? 'readonly' : '' }}>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemCode">Item Code</label>
                            <input type="text" class="form-control" id="ItemCode" name="ItemCode" value="{{ isset($transaction) ? $transaction->ItemCode : '' }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="Date">Date</label>
                            <input type="date" class="form-control" id="Date" name="Date" value="{{ isset($transaction) ? $transaction->Date : '' }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="Qty">Quantity</label>
                            <input type="number" class="form-control" id="Qty" name="Qty" value="{{ isset($transaction) ? $transaction->Qty : '' }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="TransactionType">Transaction Type</label>
                            <input type="text" class="form-control" id="TransactionType" name="TransactionType" value="{{ isset($transaction) ? $transaction->TransactionType : '' }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="StockLocation">Stock Location</label>
                            <select class="form-control" name="StockLocation" id="StockLocation" required>
                                <option value="">-- Select Product Category --</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->WarehouseName }}" {{ (isset($transaction) && $transaction->StockLocation == $warehouse->WarehouseName) ? 'selected' : '' }}>
                                        {{ $warehouse->WarehouseName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
