@extends('layouts.app')

@section("title", isset($supplier) ? "Edit Supplier" : "Add Supplier")

@section('content')
    <main class="mt-5">
        <h2>{{ isset($supplier) ? "Edit Supplier" : "Add Supplier" }}</h2>
        <form action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}" method="POST">
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
                                <input type="text" class="form-control" id="SupplierCode" name="SupplierCode" value="{{ isset($supplier) ? $supplier->SupplierCode : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="SupplierName">Supplier</label>
                                <input type="text" class="form-control" id="Supplier" name="Supplier" value="{{ isset($supplier) ? $supplier->Supplier : '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ContactTitle">Contact Title</label>
                                <input type="text" class="form-control" id="ContactTitle" name="ContactTitle" value="{{ isset($supplier) ? $supplier->ContactTitle : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="ContactName">Contact Name</label>
                                <input type="text" class="form-control" id="ContactName" name="ContactName" value="{{ isset($supplier) ? $supplier->ContactName : '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="Address" name="Address" value="{{ isset($supplier) ? $supplier->Address : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="City">City</label>
                                <input type="text" class="form-control" id="City" name="City" value="{{ isset($supplier) ? $supplier->City : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="PostalCode">Postal Code</label>
                                <input type="text" class="form-control" id="PostalCode" name="PostalCode" value="{{ isset($supplier) ? $supplier->PostalCode : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Country">Country</label>
                                <input type="text" class="form-control" id="Country" name="Country" value="{{ isset($supplier) ? $supplier->Country : '' }}" required>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group mt-3">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" id="Phone" name="Phone" value="{{ isset($supplier) ? $supplier->Phone : '' }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" value="{{ isset($supplier) ? $supplier->Email : '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
