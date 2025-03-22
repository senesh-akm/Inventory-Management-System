<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockLocation;
use Illuminate\Http\Request;

class StockLocationController extends Controller
{
    public function index()
    {
        $stocklocations = StockLocation::all();
        return view('stocklocationslist', compact('stocklocations'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stocklocation', compact('products'));
    }

    public function show($WarehouseCode)
    {
        $stocklocation = StockLocation::findOrFail($WarehouseCode);
        $products = Product::all();
        return view('stocklocation', compact('stocklocation', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'WarehouseCode' => 'required|string',
            'ProductCode' => 'required|string',
        ]);

        StockLocation::create($request->all());

        return redirect()->route('stocklocations.index')->with('success', 'Stock location created successfully.');
    }

    public function update(Request $request, $WarehouseCode)
    {
        $request->validate([
            'WarehouseCode' => 'required|string',
            'ProductCode' => 'required|string',
        ]);

        $stocklocations = StockLocation::findOrFail($WarehouseCode);
        $stocklocations->update($request->all());

        return redirect()->route('stocklocations.index')->with('success', 'Stock location updated successfully.');
    }

    public function destroy($WarehouseCode)
    {
        $stocklocations = StockLocation::find($WarehouseCode);
        $stocklocations->delete();

        return redirect()->route('stocklocations.index')->with('success', 'Stock location deleted successfully.');
    }
}
