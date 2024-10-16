<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouseslist', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouse');
    }

    public function store(Request $request)
    {
        $request->validate([
            'WarehouseCode' => 'required|unique:warehouses|max:255',
            'WarehouseName' => 'required|max:255',
            'Location' => 'required|max:255',
        ]);

        Warehouse::create($request->all());

        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully.');
    }

    public function show($WarehouseCode)
    {
        $warehouse = Warehouse::find($WarehouseCode);
        return view('warehouse', compact('warehouse'));
    }

    public function edit($WarehouseCode)
    {
        $warehouse = Warehouse::find($WarehouseCode);
        return view('warehouse', compact('warehouse'));
    }

    public function update(Request $request, $WarehouseCode)
    {
        $request->validate([
            'WarehouseName' => 'required|max:255',
            'Location' => 'required|max:255',
        ]);

        $warehouse = Warehouse::find($WarehouseCode);
        $warehouse->update($request->all());

        return redirect()->route('warehouses.index')->with('success', 'Warehouse updated successfully.');
    }

    public function destroy($WarehouseCode)
    {
        $warehouse = Warehouse::find($WarehouseCode);
        $warehouse->delete();

        return redirect()->route('warehouses.index')->with('success', 'Warehouse deleted successfully.');
    }
}
