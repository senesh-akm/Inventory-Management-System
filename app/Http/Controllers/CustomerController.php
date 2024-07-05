<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display the customer list
    public function index()
    {
        $customers = Customer::all();
        return view('customerlist', compact('customers'));
    }

    public function show($CustomerCode)
    {
        $customer = Customer::findOrFail($CustomerCode);
        return view('customer', compact('customer'));
    }

    // Show the page create new customer
    public function create()
    {
        return view('customer');
    }

    // Create new customer
    public function store(Request $request)
    {
        $request->validate([
            'CustomerCode' => 'required|string|max:5',
            'Customer' => 'required|string',
            'ContactTitle' => 'required|string|max:255',
            'ContactName' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:20',
            'Country' => 'required|string|max:255',
            'Phone' => 'required|string|max:20',
            'Email' => 'required|string|max:255'
        ]);

        Customer::create([
            'CustomerCode' => $request->CustomerCode,
            'Customer' => $request->Customer,
            'ContactTitle' => $request->ContactTitle,
            'ContactName' => $request->ContactName,
            'Address' => $request->Address,
            'City' => $request->City,
            'PostalCode' => $request->PostalCode,
            'Country' => $request->Country,
            'Phone' => $request->Phone,
            'Email' => $request->Email
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer Added Successfully!');
    }
}
