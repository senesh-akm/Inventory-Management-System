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
            <button type="submit" class="btn btn-success mt-3">{{ isset($customer) ? 'Update Customer' : 'Add Customer' }}</button>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CustomerCode">Customer Code</label>
                                <input type="text" class="form-control" id="CustomerCode" name="CustomerCode" value="{{ isset($customer) ? $customer->CustomerCode : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Customer">Customer</label>
                                <input type="text" class="form-control" id="Customer" name="Customer" value="{{ isset($customer) ? $customer->Customer : '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ContactTitle">Contact Title</label>
                                <input type="text" class="form-control" id="ContactTitle" name="ContactTitle" value="{{ isset($customer) ? $customer->ContactTitle : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="ContactName">Contact Name</label>
                                <input type="text" class="form-control" id="ContactName" name="ContactName" value="{{ isset($customer) ? $customer->ContactName : '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="Address" name="Address" value="{{ isset($customer) ? $customer->Address : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="City">City</label>
                                <input type="text" class="form-control" id="City" name="City" value="{{ isset($customer) ? $customer->City : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="PostalCode">Postal Code</label>
                                <input type="text" class="form-control" id="PostalCode" name="PostalCode" value="{{ isset($customer) ? $customer->PostalCode : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Country">Country</label>
                                <input type="text" class="form-control" id="Country" name="Country" value="{{ isset($customer) ? $customer->Country : '' }}" required>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group mt-2">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" id="Phone" name="Phone" value="{{ isset($customer) ? $customer->Phone : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" value="{{ isset($customer) ? $customer->Email : '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
