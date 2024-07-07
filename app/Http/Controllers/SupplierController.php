<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Display the suppliers list
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplierlist', compact('suppliers'));
    }

    // Show the page create new suppliers
    public function create()
    {
        return view('supplier');
    }

    // Create new suppliers
    public function store(Request $request)
    {
        $request->validate([
            'SupplierCode' => 'required|string|max:5',
            'SupplierName' => 'required|string',
            'ContactTitle' => 'required|string|max:255',
            'ContactName' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:20',
            'Country' => 'required|string|max:255',
            'Phone' => 'required|string|max:20',
            'Email' => 'required|string|max:255'
        ]);

        Supplier::create([
            'SupplierCode' => $request->SupplierCode,
            'SupplierName' => $request->SupplierName,
            'ContactTitle' => $request->ContactTitle,
            'ContactName' => $request->ContactName,
            'Address' => $request->Address,
            'City' => $request->City,
            'PostalCode' => $request->PostalCode,
            'Country' => $request->Country,
            'Phone' => $request->Phone,
            'Email' => $request->Email
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier Added Successfully!');
    }

    // Update current supplier
    public function update(Request $request, $id)
    {
        $request->validate([
            'SupplierCode' => 'required|string|max:5',
            'SupplierName' => 'required|string',
            'ContactTitle' => 'required|string|max:255',
            'ContactName' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:20',
            'Country' => 'required|string|max:255',
            'Phone' => 'required|string|max:20',
            'Email' => 'required|string|max:255'
        ]);

        $suppliers = Supplier::findOrFail($id);
        $suppliers->update([
            'SupplierCode' => $request->SupplierCode,
            'SupplierName' => $request->SupplierName,
            'ContactTitle' => $request->ContactTitle,
            'ContactName' => $request->ContactName,
            'Address' => $request->Address,
            'City' => $request->City,
            'PostalCode' => $request->PostalCode,
            'Country' => $request->Country,
            'Phone' => $request->Phone,
            'Email' => $request->Email
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier Updated Successfully!');
    }
}
