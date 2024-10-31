@extends('layouts.app')

@section('title', isset($adjestment) ? 'Edit Adjestment' : 'Create Adjestment')

@section('content')
    <main class="mt-5 mb-4">
        <h1>{{ isset($adjestment) ? 'Edit Adjestment' : 'Create Adjestment' }}</h1>
        <form action="{{ isset($adjestment) ? route('adjestments.update', $adjestment->ReturnCode) : route('adjestments.store') }}" method="POST" novalidate>
            @csrf
            @if (isset($adjestment))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success mt-3">{{ isset($adjestment) ? 'Update Adjestment' : 'Add Adjestment' }}</button>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="form-group">
                            <label for="ReturnCode">Return Code</label>
                            <input type="text" class="form-control" id="ReturnCode" value="{{ isset($adjestment) ? $adjestment->ReturnCode : $returnCode }}" required disabled>
                            <input type="hidden" name="ReturnCode" value="{{ isset($adjestment) ? $adjestment->ReturnCode : $returnCode }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="Customer">Customer</label>
                            <select class="form-control" name="Customer" id="Customer" required>
                                <option value="">-- Select Customer --</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->Customer }}" {{ (isset($adjestment) && $adjestment->Customer == $customer->Customer) ? 'selected' : '' }}>
                                        {{ $customer->Customer }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProductCode">Product Code</label>
                            <select class="form-control" name="ProductCode" id="ProductCode" required>
                                <option value="">-- Select Product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->ProductCode }}" {{ (isset($adjestment) && $adjestment->ProductCode == $product->ProductCode) ? 'selected' : '' }}>
                                        {{ $product->ProductCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemCode">Item Code</label>
                            <select class="form-control" name="ItemCode" id="ItemCode" required>
                                <option value="">-- Select Item --</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->ItemCode }}" {{ (isset($adjestment) && $adjestment->ItemCode == $item->ItemCode) ? 'selected' : '' }}>
                                        {{ $item->ItemCode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ItemSerial">Item Serial</label>
                            <select class="form-control" name="ItemSerial" id="ItemSerial" required>
                                <option value="">-- Select Item --</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->ItemSerial }}" {{ (isset($adjestment) && $adjestment->ItemSerial == $item->ItemSerial) ? 'selected' : '' }}>
                                        {{ $item->ItemSerial }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ReturnDate">Return Date</label>
                            <input type="date" class="form-control" id="ReturnDate" name="ReturnDate" value="{{ isset($adjestment) ? $adjestment->ReturnDate : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Quantity">Quantity</label>
                            <input type="number" class="form-control" id="Quantity" name="Quantity" value="{{ isset($adjestment) ? $adjestment->Quantity : '' }}" required placeholder="e.g.: 10">
                            <div class="invalid-feedback">Quantity is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="Reason">Reason</label>
                            <input type="text" class="form-control" id="Reason" name="Reason" value="{{ isset($adjestment) ? $adjestment->Reason : '' }}" required placeholder="e.g.: Damaged">
                            <div class="invalid-feedback">Reason is required.</div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ReceivePerson">Receive by</label>
                            <input type="text" class="form-control" id="ReceivePerson" name="ReceivePerson" value="{{ isset($adjestment) ? $adjestment->ReceivePerson : '' }}" required placeholder="e.g.: Mr. Nipuna">
                            <div class="invalid-feedback">Received person is required.</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
