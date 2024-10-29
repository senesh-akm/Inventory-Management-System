@extends('layouts.app')

@section("title", isset($supplier) ? "Edit Supplier" : "Add Supplier")

@section('content')
    <main class="mt-5">
        <h2>{{ isset($supplier) ? "Edit Supplier" : "Add Supplier" }}</h2>
        <form action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($supplier))
                @method('PUT')
            @endif
            <button type="submit" class="btn btn-success mt-3">{{ isset($supplier) ? 'Update Supplier' : 'Add Supplier' }}</button>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="SupplierCode">Supplier Code</label>
                                <input type="text" class="form-control" id="SupplierCode" name="SupplierCode" value="{{ isset($supplier) ? $supplier->SupplierCode : '' }}" maxlength="5" required oninput="this.value = this.value.toUpperCase()" placeholder="e.g.: ABCSP" {{ isset($supplier) ? 'readonly' : '' }}>
                                <div class="invalid-feedback">Customer Code is required and should be a maximum of 5 letters.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="SupplierName">Company</label>
                                <input type="text" class="form-control" id="Supplier" name="Supplier" value="{{ isset($supplier) ? $supplier->Supplier : '' }}" required placeholder="e.g.: ABC Supplier">
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
                                <input type="text" class="form-control" id="ContactName" name="ContactName" value="{{ isset($supplier) ? $supplier->ContactName : '' }}" required placeholder="e.g.: Senesh Akmeemana">
                                <div class="invalid-feedback">Contact name is required.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="Address" name="Address" value="{{ isset($supplier) ? $supplier->Address : '' }}" required placeholder="e.g.: 99/4, Yashodara Mawatha">
                                <div class="invalid-feedback">Address is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="City">City</label>
                                <input type="text" class="form-control" id="City" name="City" value="{{ isset($supplier) ? $supplier->City : '' }}" required placeholder="e.g.: Udugampola">
                                <div class="invalid-feedback">City is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="PostalCode">Postal Code</label>
                                <input type="text" class="form-control" id="PostalCode" name="PostalCode" value="{{ isset($supplier) ? $supplier->PostalCode : '' }}" required placeholder="e.g.: 11030">
                                <div class="invalid-feedback">Postal code is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Country">Country</label>
                                <input type="text" class="form-control" id="Country" name="Country" value="{{ isset($supplier) ? $supplier->Country : '' }}" required placeholder="e.g.: Sri Lanka">
                                <div class="invalid-feedback">Country is required.</div>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group mt-3">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" id="Phone" name="Phone" value="{{ isset($supplier) ? $supplier->Phone : '' }}" required placeholder="e.g.: +94716589127">
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" value="{{ isset($supplier) ? $supplier->Email : '' }}" required placeholder="e.g.: senesh@abc.lk">
                                <div class="invalid-feedback">Email address is required.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
