@extends('layouts.app')

@section("title", isset($customer) ? "Edit Customer" : "Add Customer")

@section('content')
    <main class="mt-5">
        <h2>{{ isset($customer) ? "Edit Customer" : "Add Customer" }}</h2>
        <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST" novalidate>
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
                                <input type="text" class="form-control" id="CustomerCode" name="CustomerCode" value="{{ isset($customer) ? $customer->CustomerCode : '' }}" maxlength="5" required oninput="this.value = this.value.toUpperCase()" placeholder="e.g.: HYLGR" {{ isset($customer) ? 'readonly' : '' }}>
                                <div class="invalid-feedback">Customer Code is required and should be a maximum of 5 letters.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Customer">Company Name</label>
                                <input type="text" class="form-control" id="Customer" name="Customer" value="{{ isset($customer) ? $customer->Customer : '' }}" required placeholder="e.g.: Hayleys Group">
                                <div class="invalid-feedback">Company name is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ContactTitle">Contact Title</label>
                                <select class="form-control" id="ContactTitle" name="ContactTitle" required>
                                    <option value="">-- Select Title --</option>
                                    <option value="Mr." {{ (isset($customer) && $customer->ContactTitle == 'Mr') ? 'selected' : '' }}>Mr.</option>
                                    <option value="Ms." {{ (isset($customer) && $customer->ContactTitle == 'Ms') ? 'selected' : '' }}>Ms.</option>
                                    <option value="Mrs." {{ (isset($customer) && $customer->ContactTitle == 'Mrs') ? 'selected' : '' }}>Mrs.</option>
                                </select>
                                <div class="invalid-feedback">Contact title is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="ContactName">Contact Name</label>
                                <input type="text" class="form-control" id="ContactName" name="ContactName" value="{{ isset($customer) ? $customer->ContactName : '' }}" required placeholder="e.g.: Senesh Akmeemana">
                                <div class="invalid-feedback">Contact name is required.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="Address" name="Address" value="{{ isset($customer) ? $customer->Address : '' }}" required placeholder="e.g.: No.400 Deans Road,">
                                <div class="invalid-feedback">Address is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="City">City</label>
                                <input type="text" class="form-control" id="City" name="City" value="{{ isset($customer) ? $customer->City : '' }}" required placeholder="e.g.: Colombo">
                                <div class="invalid-feedback">City is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="PostalCode">Postal Code</label>
                                <input type="text" class="form-control" id="PostalCode" name="PostalCode" value="{{ isset($customer) ? $customer->PostalCode : '' }}" required placeholder="e.g.: 01000">
                                <div class="invalid-feedback">Postal code is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Country">Country</label>
                                <input type="text" class="form-control" id="Country" name="Country" value="{{ isset($customer) ? $customer->Country : '' }}" required placeholder="e.g.: Sri Lanka">
                                <div class="invalid-feedback">Country is required.</div>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group mt-2">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" id="Phone" name="Phone" value="{{ isset($customer) ? $customer->Phone : '' }}" required placeholder="e.g.: +94716589127">
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" value="{{ isset($customer) ? $customer->Email : '' }}" required placeholder="e.g.: senesh.a@heyleys.lk">
                                <div class="invalid-feedback">Email address is required.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
