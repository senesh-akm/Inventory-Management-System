@extends('layouts.app')

@section("title", isset($transaction) ? "Edit Transaction" : "Add Transaction")

@section('content')
    <main class="mt-5">
        <h1>{{ isset($transaction) ? 'Edit Transaction' : 'Create New Transaction' }}</h1>
        <form action="{{ isset($transaction) ? route('transactions.update', $transaction->TransactionCode) : route('transactions.store') }}" method="POST" novalidate>
            @csrf
            @if (isset($transaction))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success mt-3">{{ isset($transaction) ? 'Update Transaction' : 'Create Transaction' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="TransactionCode">Transaction Code</label>
                            <input type="text" class="form-control" id="TransactionCode" name="TransactionCode" value="{{ isset($transaction) ? $transaction->TransactionCode : '' }}" maxlength="6" required oninput="this.value = this.value.toUpperCase()" placeholder="e.g.: FACOFC" {{ isset($transaction) ? 'readonly' : '' }}>
                            <div class="invalid-feedback">Transaction Code is required and should be a maximum of 6 letters.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemCode">Item Code</label>
                            <select class="form-control" name="ItemCode" id="ItemCode" required>
                                <option value="">-- Select Item Code --</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->ItemCode }}" {{ (isset($transaction) && $transaction->ItemCode == $item->ItemCode) ? 'selected' : '' }}>
                                        {{ $item->ItemCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Date">Date</label>
                            <input type="date" class="form-control" id="Date" name="Date" value="{{ isset($transaction) ? $transaction->Date : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Qty">Quantity</label>
                            <input type="number" class="form-control" id="Qty" name="Qty" value="{{ isset($transaction) ? $transaction->Qty : '' }}" required placeholder="e.g.: 12">
                            <div class="invalid-feedback">Quantity is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="TransactionType">Transaction Type</label>
                            <input type="text" class="form-control" id="TransactionType" name="TransactionType" value="{{ isset($transaction) ? $transaction->TransactionType : '' }}" required placeholder="e.g.: Factory to Office">
                            <div class="invalid-feedback">Transaction type is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="StockLocation">Stock Location</label>
                            <select class="form-control" name="StockLocation" id="StockLocation" required>
                                <option value="">-- Select Stock Location --</option>
                                @foreach($stocklocations as $stocklocation)
                                    <option value="{{ $stocklocation->WarehouseCode }}" {{ (isset($transaction) && $transaction->StockLocation == $stocklocation->WarehouseCode) ? 'selected' : '' }}>
                                        {{ $stocklocation->WarehouseCode }}
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
