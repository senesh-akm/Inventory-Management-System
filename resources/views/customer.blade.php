@extends('layouts.app')

@section("title", "Add Customer")

@section('content')
    <main class="mt-5">
        <h2>Add Customer</h2>
        <form>
            <div class="form-group">
                <label for="customerCode">Customer Code</label>
                <input type="text" class="form-control" id="customerCode" placeholder="Enter Customer Code">
            </div>
            <div class="form-group">
                <label for="customer">Customer</label>
                <input type="text" class="form-control" id="customer" placeholder="Enter Customer">
            </div>
            <div class="form-group">
                <label for="contactTitle">Contact Title</label>
                <input type="text" class="form-control" id="contactTitle" placeholder="Enter Contact Title">
            </div>
            <div class="form-group">
                <label for="contactName">Contact Name</label>
                <input type="text" class="form-control" id="contactName" placeholder="Enter Contact Name">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="Enter City">
            </div>
            <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input type="text" class="form-control" id="postalCode" placeholder="Enter Postal Code">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" placeholder="Enter Country">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection
