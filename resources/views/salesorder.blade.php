@extends('layouts.app')

@section('title', isset($salesorder) ? 'Edit Sales Orders' : 'Create Sales Orders')

@section('content')
    <main class="container mt-5">
        <h1>{{ isset($salesorder) ? 'Edit Sales Orders' : 'Create Sales Orders' }}</h1>
        <form action="{{ isset($salesorder) ? route('salesorders.update', $salesorder->Sales OrdersCode) : route('salesorders.store') }}" method="POST">
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
                            <input type="text" class="form-control" id="SalesOrderID" name="SalesOrderID" value="{{ isset($salesorder) ? $salesorder->SalesOrderID : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="CustomerCode">Customer Code</label>
                            <input type="text" class="form-control" id="CustomerCode" name="CustomerCode" value="{{ isset($salesorder) ? $salesorder->CustomerCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProductCode">Product Code</label>
                            <input type="text" class="form-control" id="ProductCode" name="ProductCode" value="{{ isset($salesorder) ? $salesorder->ProductCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemCode">Item Code</label>
                            <input type="text" class="form-control" id="ItemCode" name="ItemCode" value="{{ isset($salesorder) ? $salesorder->ItemCode : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="OrderDate">Order Date</label>
                            <input type="text" class="form-control" id="OrderDate" name="OrderDate" value="{{ isset($salesorder) ? $salesorder->OrderDate : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="OrderDate">Order Date</label>
                            <input type="text" class="form-control" id="OrderDate" name="OrderDate" value="{{ isset($salesorder) ? $salesorder->OrderDate : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Qty">Quantity</label>
                            <input type="text" class="form-control" id="Qty" name="Qty" value="{{ isset($salesorder) ? $salesorder->Qty : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="UnitPrice">Unit Price</label>
                            <input type="text" class="form-control" id="UnitPrice" name="UnitPrice" value="{{ isset($salesorder) ? $salesorder->UnitPrice : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="TotalAmount">Total Amount</label>
                            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" value="{{ isset($salesorder) ? $salesorder->TotalAmount : '' }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
