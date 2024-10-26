<?php

namespace App\Http\Controllers;

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
        return view('stocklocation');
    }

    public function show($WarehouseCode)
    {
        $stocklocations = StockLocation::findOrFail($WarehouseCode);
        return view('stocklocation', compact('stocklocation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'WarehouseCode' => 'required|string',
            'ProductCode' => 'required|string',
            'Qty' => 'integer',
        ]);

        StockLocation::create($request->all());

        return redirect()->route('stocklocations.index')->with('success', 'Stock location created successfully.');
    }

    public function update(Request $request, $WarehouseCode)
    {
        $request->validate([
            'WarehouseCode' => 'required|string',
            'ProductCode' => 'required|string',
            'Qty' => 'integer',
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
