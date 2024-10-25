<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseorders = PurchaseOrder::all();
        return view('purchaseorderslist', compact('purchaseorders'));
    }

    public function create()
    {
        return view('purchaseorder');
    }

    public function show($PurchaseOrderID)
    {
        $purchaseorders = PurchaseOrder::findOrFail($PurchaseOrderID);
        return view('purchaseorder', compact('purchaseorder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'PurchaseOrderID' => 'required|string|max:8',
            'CustomerCode' => 'required|string',
            'ItemCode' => 'required|string',
            'OrderDate' => 'required|date',
            'Qty' => 'integer',
            'UnitPrice' => 'required|string',
            'TotalAmount' => 'required|string',
        ]);

        PurchaseOrder::create($request->all());

        return redirect()->route('purchaseorders.index')->with('success', 'Purchase order created successfully.');
    }

    public function update(Request $request, $PurchaseOrderID)
    {
        $request->validate([
            'PurchaseOrderID' => 'required|string|max:8',
            'CustomerCode' => 'required|string',
            'ItemCode' => 'required|string',
            'OrderDate' => 'required|date',
            'Qty' => 'integer',
            'UnitPrice' => 'required|string',
            'TotalAmount' => 'required|string',
        ]);

        $purchaseorders = PurchaseOrder::findOrFail($PurchaseOrderID);
        $purchaseorders->update($request->all());

        return redirect()->route('purchaseorders.index')->with('success', 'Purchase order updated successfully.');
    }

    public function destroy($PurchaseOrderID)
    {
        $purchaseorders = PurchaseOrder::find($PurchaseOrderID);
        $purchaseorders->delete();

        return redirect()->route('purchaseorders.index')->with('success', 'Purchase order deleted successfully.');
    }
}
