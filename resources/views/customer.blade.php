@extends('layouts.app')

@section("title", isset($customer) ? "Edit Customer" : "Add Customer")

@section('content')
    <main class="mt-5">
        <h2>{{ isset($customer) ? "Edit Customer" : "Add Customer" }}</h2>
        <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST">
            @csrf
            @if(isset($customer))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-primary mt-3">{{ isset($customer) ? 'Update' : 'Submit' }}</button>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="CustomerCode">Customer Code</label>
                        <input type="text" class="form-control mt-2" id="CustomerCode" name="CustomerCode" placeholder="Enter Customer Code" value="{{ isset($customer) ? $customer->CustomerCode : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Customer">Customer</label>
                        <input type="text" class="form-control mt-2" id="Customer" name="Customer" placeholder="Enter Customer" value="{{ isset($customer) ? $customer->Customer : '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ContactTitle">Contact Title</label>
                        <input type="text" class="form-control mt-2" id="ContactTitle" name="ContactTitle" placeholder="Enter Contact Title" value="{{ isset($customer) ? $customer->ContactTitle : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ContactName">Contact Name</label>
                        <input type="text" class="form-control mt-2" id="ContactName" name="ContactName" placeholder="Enter Contact Name" value="{{ isset($customer) ? $customer->ContactName : '' }}" required>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control mt-2" id="Address" name="Address" placeholder="Enter Address" value="{{ isset($customer) ? $customer->Address : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="City">City</label>
                        <input type="text" class="form-control mt-2" id="City" name="City" placeholder="Enter City" value="{{ isset($customer) ? $customer->City : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="PostalCode">Postal Code</label>
                        <input type="text" class="form-control mt-2" id="PostalCode" name="PostalCode" placeholder="Enter Postal Code" value="{{ isset($customer) ? $customer->PostalCode : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Country">Country</label>
                        <input type="text" class="form-control mt-2" id="Country" name="Country" placeholder="Enter Country" value="{{ isset($customer) ? $customer->Country : '' }}" required>
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control mt-2" id="Phone" name="Phone" placeholder="Enter Phone Number" value="{{ isset($customer) ? $customer->Phone : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control mt-2" id="Email" name="Email" placeholder="Enter Email" value="{{ isset($customer) ? $customer->Email : '' }}" required>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
