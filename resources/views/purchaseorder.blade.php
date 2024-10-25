@extends('layouts.app')

@section('title', isset($purchaseorder) ? 'Edit Purchase Orders' : 'Create Purchase Orders')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($purchaseorder) ? 'Edit Purchase Orders' : 'Create Purchase Orders' }}</h1>
        <form action="{{ isset($purchaseorder) ? route('purchaseorders.update', $purchaseorder->PurchaseOrderID) : route('purchaseorders.store') }}" method="POST">
            @csrf
            @if (isset($purchaseorder))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success">{{ isset($purchaseorder) ? 'Update Purchase Orders' : 'Create Purchase Orders' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="PurchaseOrderID">Purchase Order ID</label>
                            <input type="text" class="form-control" id="PurchaseOrderID" name="PurchaseOrderID" value="{{ isset($purchaseorder) ? $purchaseorder->PurchaseOrderID : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="SupplierCode">Supplier Code</label>
                            <input type="text" class="form-control" id="SupplierCode" name="SupplierCode" value="{{ isset($purchaseorder) ? $purchaseorder->SupplierCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemCode">Item Code</label>
                            <input type="text" class="form-control" id="ItemCode" name="ItemCode" value="{{ isset($purchaseorder) ? $purchaseorder->ItemCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="OrderDate">Order Date</label>
                            <input type="text" class="form-control" id="OrderDate" name="OrderDate" value="{{ isset($purchaseorder) ? $purchaseorder->OrderDate : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Qty">Quantity</label>
                            <input type="text" class="form-control" id="Qty" name="Qty" value="{{ isset($purchaseorder) ? $purchaseorder->Qty : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="UnitPrice">Unit Price</label>
                            <input type="text" class="form-control" id="UnitPrice" name="UnitPrice" value="{{ isset($purchaseorder) ? $purchaseorder->UnitPrice : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="TotalAmount">Total Amount</label>
                            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" value="{{ isset($purchaseorder) ? $purchaseorder->TotalAmount : '' }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
