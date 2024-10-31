@extends('layouts.app')

@section('title', isset($salesorder) ? 'Edit Sales Orders' : 'Create Sales Orders')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($salesorder) ? 'Edit Sales Orders' : 'Create Sales Orders' }}</h1>
        <form action="{{ isset($salesorder) ? route('salesorders.update', $salesorder->SalesOrderID) : route('salesorders.store') }}" method="POST" novalidate>
            @csrf
            @if (isset($salesorder))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success">{{ isset($salesorder) ? 'Update Sales Orders' : 'Create Sales Orders' }}</button>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="SalesOrderID">Sales Order ID</label>
                            <input type="text" class="form-control" id="SalesOrderID" value="{{ isset($salesorder) ? $salesorder->SalesOrderID : $salesID }}" required disabled>
                            <input type="hidden" name="SalesOrderID" value="{{ isset($salesorder) ? $salesorder->SalesOrderID : $salesID }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="CustomerCode">Customer Code</label>
                            <select class="form-control" name="CustomerCode" id="CustomerCode" required>
                                <option value="">-- Select Customer Code --</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->CustomerCode }}" {{ (isset($salesorder) && $salesorder->CustomerCode == $customer->CustomerCode) ? 'selected' : '' }}>
                                        {{ $customer->CustomerCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProductCode">Product Code</label>
                            <select class="form-control" name="ProductCode" id="ProductCode" required>
                                <option value="">-- Select Product Code --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->ProductCode }}" {{ (isset($salesorder) && $salesorder->ProductCode == $product->ProductCode) ? 'selected' : '' }}>
                                        {{ $product->ProductCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemCode">Item Code</label>
                            <select class="form-control" name="ItemCode" id="ItemCode" required onchange="fetchUnitPrice(this.value)">
                                <option value="">-- Select Item Code --</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->ItemCode }}" {{ (isset($salesorder) && $salesorder->ItemCode == $item->ItemCode) ? 'selected' : '' }}>
                                        {{ $item->ItemCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="OrderDate">Order Date</label>
                            <input type="date" class="form-control" id="OrderDate" name="OrderDate" value="{{ isset($salesorder) ? $salesorder->OrderDate : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Qty">Quantity</label>
                            <input type="number" class="form-control" id="Qty" name="Qty" value="{{ isset($salesorder) ? $salesorder->Qty : '' }}" required placeholder="e.g.: 10" oninput="calculateTotalAmount()">
                            <div class="invalid-feedback">Quantity is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="UnitPrice">Unit Price (LKR)</label>
                            <input type="text" class="form-control" id="UnitPrice" name="UnitPrice" value="{{ isset($salesorder) ? number_format($salesorder->UnitPrice, 0, '.', ',') : '' }}" required placeholder="e.g.: 125,000" oninput="formatNumber(this); calculateTotalAmount()">
                            <div class="invalid-feedback">Unit price is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="TotalAmount">Total Amount (LKR)</label>
                            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" value="{{ isset($salesorder) ? number_format($salesorder->TotalAmount, 0, '.', ',') : '' }}" required placeholder="e.g.: 1,250,000" readonly>
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
