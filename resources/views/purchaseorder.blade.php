@extends('layouts.app')

@section('title', isset($purchaseorder) ? 'Edit Purchase Orders' : 'Create Purchase Orders')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($purchaseorder) ? 'Edit Purchase Orders' : 'Create Purchase Orders' }}</h1>
        <form action="{{ isset($purchaseorder) ? route('purchaseorders.update', $purchaseorder->PurchaseOrderID) : route('purchaseorders.store') }}" method="POST" novalidate>
            @csrf
            @if (isset($purchaseorder))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success mt-3">{{ isset($purchaseorder) ? 'Update Purchase Orders' : 'Create Purchase Orders' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="PurchaseOrderID">Purchase Order ID</label>
                            <input type="text" class="form-control" id="PurchaseOrderID" value="{{ isset($purchaseorder) ? $purchaseorder->PurchaseOrderID : $purchaseID }}" required disabled>
                            <input type="hidden" name="PurchaseOrderID" value="{{ isset($purchaseorder) ? $purchaseorder->PurchaseOrderID : $purchaseID }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="SupplierCode">Supplier Code</label>
                            <select class="form-control" name="SupplierCode" id="SupplierCode" required>
                                <option value="">-- Select Item Code --</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->SupplierCode }}" {{ (isset($purchaseorder) && $purchaseorder->SupplierCode == $supplier->SupplierCode) ? 'selected' : '' }}>
                                        {{ $supplier->SupplierCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemCode">Item Code</label>
                            <select class="form-control" name="ItemCode" id="ItemCode" required onchange="fetchUnitPrice(this.value)">
                                <option value="">-- Select Item Code --</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->ItemCode }}" {{ (isset($purchaseorder) && $purchaseorder->ItemCode == $item->ItemCode) ? 'selected' : '' }}>
                                        {{ $item->ItemCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="OrderDate">Order Date</label>
                            <input type="date" class="form-control" id="OrderDate" name="OrderDate" value="{{ isset($purchaseorder) ? $purchaseorder->OrderDate : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Qty">Quantity</label>
                            <input type="number" class="form-control" id="Qty" name="Qty" value="{{ isset($purchaseorder) ? $purchaseorder->Qty : '' }}" required placeholder="e.g.: 10" oninput="calculateTotalAmount()">
                            <div class="invalid-feedback">Quantity is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="UnitPrice">Unit Price</label>
                            <input type="text" class="form-control" id="UnitPrice" name="UnitPrice" value="{{ isset($purchaseorder) ? number_format($purchaseorder->UnitPrice, 0, '.', ',') : '' }}" required placeholder="e.g.: 25,000" oninput="formatNumber(this); calculateTotalAmount()">
                            <div class="invalid-feedback">Unit price is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="TotalAmount">Total Amount</label>
                            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" value="{{ isset($purchaseorder) ? number_format($purchaseorder->TotalAmount, 0, '.', ',') : '' }}" required placeholder="e.g.: 250,000" readonly>
                            <div class="invalid-feedback">Total amount is required.</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        function formatNumber(input) {
            const value = input.value.replace(/,/g, '');
            input.value = Number(value).toLocaleString('en-US');
        }

        function fetchUnitPrice(itemCode) {
            if (!itemCode) return;

            fetch(`/items/${itemCode}`).then(response => response.json()).then(data => {
                if (data.UnitPrice) {
                    const unitPriceInput = document.getElementById('UnitPrice');
                    unitPriceInput.value = data.UnitPrice;
                    calculateTotalAmount();
                }
            })
            .catch(error => console.error('Error fetching unit price:', error));
        }

        function calculateTotalAmount(input) {
            const qty = document.getElementById('Qty').value;
            const unitPrice = document.getElementById('UnitPrice').value.replace(/,/g, '');

            if (qty && unitPrice) {
                const totalAmount = qty * unitPrice;
                document.getElementById('TotalAmount').value = Number(totalAmount).toLocaleString('en-US');
            } else {
                document.getElementById('TotalAmount').value = '';
            }
        }
    </script>
@endsection
