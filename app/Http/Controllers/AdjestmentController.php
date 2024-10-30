<?php

namespace App\Http\Controllers;

use App\Models\Adjestment;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class AdjestmentController extends Controller
{
    public function index()
    {
        $adjestments = Adjestment::all();
        return view('adjestmentslist', compact('adjestments'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $items = Item::all();

        // Get today's date in 'ymd' format to match the date pattern in ReturnCode
        $todayCodePrefix = 'RTN' . date('ymd');

        $lastAdjestmentToday = Adjestment::where('ReturnCode', 'like', $todayCodePrefix . '%')
                                ->orderBy('ReturnCode', 'desc')
                                ->first();

        $baseCode = '001';

        if ($lastAdjestmentToday) {
            $lastCodeNumber = (int) substr($lastAdjestmentToday->ReturnCode, -3);
            $baseCode = str_pad($lastCodeNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        $returnCode = $todayCodePrefix . $baseCode;

        return view('adjestment', compact('customers', 'products', 'items', 'returnCode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ReturnCode' => 'required|max:12',
            'Customer' => 'required|max:255',
            'ProductCode' => 'required|max:255',
            'ItemCode' => 'required|max:255',
            'ReturnDate' => 'required',
            'Quantity' => 'required|integer',
            'Reason' => 'required|max:255',
            'ReceivePerson' => 'required|max:255',
        ]);

        Adjestment::create($request->all());

        return redirect()->route('adjestments.index')->with('success', 'Adjestment created successfully.');
    }

    public function show($ReturnCode)
    {
        $adjestment = Adjestment::findOrFail($ReturnCode);
        $customers = Customer::all();
        $products = Product::all();
        $items = Item::all();
        return view('adjestment', compact('adjestment', 'customers', 'products', 'items'));
    }

    public function update(Request $request, $ReturnCode)
    {
        $request->validate([
            'Customer' => 'required|max:255',
            'ProductCode' => 'required|max:255',
            'ItemCode' => 'required|max:255',
            'ReturnDate' => 'required',
            'Quantity' => 'required|integer',
            'Reason' => 'required|max:255',
            'ReceivePerson' => 'required|max:255',
        ]);

        $adjestment = Adjestment::find($ReturnCode);
        $adjestment->update($request->all());

        return redirect()->route('adjestments.index')->with('success', 'Adjestment updated successfully.');
    }

    public function destroy($ReturnCode)
    {
        $adjestment = Adjestment::find($ReturnCode);
        $adjestment->delete();

        return redirect()->route('adjestments.index')->with('success', 'Adjestment deleted successfully.');
    }
}
