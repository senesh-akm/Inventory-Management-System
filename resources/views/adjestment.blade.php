@extends('layouts.app')

@section('title', isset($adjestment) ? 'Edit Adjestment' : 'Create Adjestment')

@section('content')
    <main class="container mt-5 mb-4">
        <h1>{{ isset($adjestment) ? 'Edit Adjestment' : 'Create Adjestment' }}</h1>
        <form action="{{ isset($adjestment) ? route('adjestments.update', $adjestment->ReturnCode) : route('adjestments.store') }}" method="POST">
            @csrf
            @if (isset($adjestment))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-primary">{{ isset($adjestment) ? 'Update' : 'Create' }}</button>
            <div class="form-group mt-2">
                <label for="ReturnCode">Return Code</label>
                <input type="text" class="form-control" id="ReturnCode" name="ReturnCode" value="{{ isset($adjestment) ? $adjestment->ReturnCode : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="Customer">Customer</label>
                <input type="text" class="form-control" id="Customer" name="Customer" value="{{ isset($adjestment) ? $adjestment->Customer : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="ProductCode">Product Code</label>
                <input type="text" class="form-control" id="ProductCode" name="ProductCode" value="{{ isset($adjestment) ? $adjestment->ProductCode : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="ItemCode">Item Code</label>
                <input type="text" class="form-control" id="ItemCode" name="ItemCode" value="{{ isset($adjestment) ? $adjestment->ItemCode : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="ItemSerial">Item Serial</label>
                <input type="text" class="form-control" id="ItemSerial" name="ItemSerial" value="{{ isset($adjestment) ? $adjestment->ItemSerial : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="ReturnDate">Return Date</label>
                <input type="date" class="form-control" id="ReturnDate" name="ReturnDate" value="{{ isset($adjestment) ? $adjestment->ReturnDate : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="Quantity">Quantity</label>
                <input type="number" class="form-control" id="Quantity" name="Quantity" value="{{ isset($adjestment) ? $adjestment->Quantity : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="Reason">Reason</label>
                <input type="text" class="form-control" id="Reason" name="Reason" value="{{ isset($adjestment) ? $adjestment->Reason : '' }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="ReceivePerson">Receive Person</label>
                <input type="text" class="form-control" id="ReceivePerson" name="ReceivePerson" value="{{ isset($adjestment) ? $adjestment->ReceivePerson : '' }}" required>
            </div>
        </form>
    </main>
@endsection
