<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    public function index()
    {
        $salesorders = SalesOrder::all();
        return view('salesorderslist', compact('salesorders'));
    }

    public function create()
    {
        return view('salesorder');
    }

    public function show($SalesOrderID)
    {
        $salesorders = SalesOrder::findOrFail($SalesOrderID);
        return view('salesorder', compact('salesorder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'SalesOrderID' => 'required|string|max:8',
            'CustomerCode' => 'required|string',
            'ProductCode' => 'required|string',
            'ItemCode' => 'required|string',
            'OrderDate' => 'required|date',
            'Qty' => 'integer',
            'UnitPrice' => 'required|string',
            'TotalAmount' => 'required|string',
        ]);

        SalesOrder::create($request->all());

        return redirect()->route('salesorders.index')->with('success', 'Sales order created successfully.');
    }

    public function update(Request $request, $SalesOrderID)
    {
        $request->validate([
            'SalesOrderID' => 'required|string|max:8',
            'CustomerCode' => 'required|string',
            'ProductCode' => 'required|string',
            'ItemCode' => 'required|string',
            'OrderDate' => 'required|date',
            'Qty' => 'integer',
            'UnitPrice' => 'required|string',
            'TotalAmount' => 'required|string',
        ]);

        $salesorders = SalesOrder::findOrFail($SalesOrderID);
        $salesorders->update($request->all());

        return redirect()->route('salesorders.index')->with('success', 'Sales order updated successfully.');
    }

    public function destroy($SalesOrderID)
    {
        $salesorders = SalesOrder::find($SalesOrderID);
        $salesorders->delete();

        return redirect()->route('salesorders.index')->with('success', 'Sales order deleted successfully.');
    }
}
