@extends('layouts.app')

@section("title", "Add Customer")

@section('content')
    <main class="mt-5">
        <h2>Add Customer</h2>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customerCode">Customer Code</label>
                <input type="text" class="form-control" id="CustomerCode" name="CustomerCode" placeholder="Enter Customer Code" required>
            </div>
            <div class="form-group">
                <label for="customer">Customer</label>
                <input type="text" class="form-control" id="Customer" name="Customer" placeholder="Enter Customer" required>
            </div>
            <div class="form-group">
                <label for="contactTitle">Contact Title</label>
                <input type="text" class="form-control" id="ContactTitle" name="ContactTitle" placeholder="Enter Contact Title" required>
            </div>
            <div class="form-group">
                <label for="contactName">Contact Name</label>
                <input type="text" class="form-control" id="ContactName" name="ContactName" placeholder="Enter Contact Name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="City" name="City" placeholder="Enter City" required>
            </div>
            <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input type="text" class="form-control" id="PostalCode" name="PostalCode" placeholder="Enter Postal Code" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="Country" name="Country" placeholder="Enter Country" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Enter Phone Number" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection
