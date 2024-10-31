<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Product;
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
        $customers = Customer::all();
        $products = Product::all();
        $items = Item::all();

        // Get today's date in 'ymd' format to match the date pattern in SalesOrderID
        $todayCodePrefix = 'SO' . date('ymd');

        $lastAdjestmentToday = SalesOrder::where('SalesOrderID', 'like', $todayCodePrefix . '%')
                                ->orderBy('SalesOrderID', 'desc')
                                ->first();

        $baseCode = '001';

        if ($lastAdjestmentToday) {
            $lastCodeNumber = (int) substr($lastAdjestmentToday->SalesOrderID, -3);
            $baseCode = str_pad($lastCodeNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        $salesID = $todayCodePrefix . $baseCode;

        return view('salesorder', compact('customers', 'products', 'items', 'salesID'));
    }

    public function show($SalesOrderID)
    {
        $salesorder = SalesOrder::where('SalesOrderID', $SalesOrderID)->firstOrFail();
        $customers = Customer::all();
        $products = Product::all();
        $items = Item::all();
        return view('salesorder', compact('salesorder', 'customers', 'products', 'items'));
    }

    public function getItemDetails($ItemCode)
    {
        $item = Item::where('ItemCode', $ItemCode)->first();

        if ($item) {
            return response()->json([
                'UnitPrice' => number_format($item->UnitPrice, 2, '.', ',')
            ]);
        }

        return response()->json(['error' => 'Item not found'], 404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'SalesOrderID' => 'required|string',
            'CustomerCode' => 'required|string',
            'ProductCode' => 'required|string',
            'ItemCode' => 'required|string',
            'OrderDate' => 'required|date',
            'Qty' => 'integer',
            'UnitPrice' => 'required|string',
            'TotalAmount' => 'required|string',
        ]);

        // Remove commas for numeric fields
        $data = $request->all();
        $data['UnitPrice'] = str_replace(',', '', $data['UnitPrice']);
        $data['TotalAmount'] = str_replace(',', '', $data['TotalAmount']);

        SalesOrder::create($data);

        return redirect()->route('salesorders.index')->with('success', 'Sales order created successfully.');
    }

    public function update(Request $request, $SalesOrderID)
    {
        $request->validate([
            'SalesOrderID' => 'required|string',
            'CustomerCode' => 'required|string',
            'ProductCode' => 'required|string',
            'ItemCode' => 'required|string',
            'OrderDate' => 'required|date',
            'Qty' => 'integer',
            'UnitPrice' => 'required|string',
            'TotalAmount' => 'required|string',
        ]);

        // Remove commas for numeric fields
        $data = $request->all();
        $data['UnitPrice'] = str_replace(',', '', $data['UnitPrice']);
        $data['TotalAmount'] = str_replace(',', '', $data['TotalAmount']);

        $salesorder = SalesOrder::findOrFail($SalesOrderID);
        $salesorder->update($data);

        return redirect()->route('salesorders.index')->with('success', 'Sales order updated successfully.');
    }

    public function destroy($SalesOrderID)
    {
        $salesorders = SalesOrder::find($SalesOrderID);
        $salesorders->delete();

        return redirect()->route('salesorders.index')->with('success', 'Sales order deleted successfully.');
    }
}
