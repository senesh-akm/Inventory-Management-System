<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
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
        $suppliers = Supplier::all();
        $items = Item::all();

        // Get today's date in 'ymd' format to match the date pattern in PurchaseOrderID
        $todayCodePrefix = 'PO' . date('ymd');

        $lastAdjestmentToday = PurchaseOrder::where('PurchaseOrderID', 'like', $todayCodePrefix . '%')
                                ->orderBy('PurchaseOrderID', 'desc')
                                ->first();

        $baseCode = '001';

        if ($lastAdjestmentToday) {
            $lastCodeNumber = (int) substr($lastAdjestmentToday->PurchaseOrderID, -3);
            $baseCode = str_pad($lastCodeNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        $purchaseID = $todayCodePrefix . $baseCode;

        return view('purchaseorder', compact('suppliers', 'items', 'purchaseID'));
    }

    public function show($PurchaseOrderID)
    {
        $purchaseorder = PurchaseOrder::findOrFail($PurchaseOrderID);
        $suppliers = Supplier::all();
        $items = Item::all();
        return view('purchaseorder', compact('purchaseorder', 'suppliers', 'items'));
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
            'PurchaseOrderID' => 'required|string',
            'SupplierCode' => 'required|string',
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

        PurchaseOrder::create($data);

        return redirect()->route('purchaseorders.index')->with('success', 'Purchase order created successfully.');
    }

    public function update(Request $request, $PurchaseOrderID)
    {
        $request->validate([
            'PurchaseOrderID' => 'required|string',
            'SupplierCode' => 'required|string',
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

        $salesorder = PurchaseOrder::findOrFail($PurchaseOrderID);
        $salesorder->update($data);

        return redirect()->route('purchaseorders.index')->with('success', 'Purchase order updated successfully.');
    }

    public function destroy($PurchaseOrderID)
    {
        $purchaseorders = PurchaseOrder::find($PurchaseOrderID);
        $purchaseorders->delete();

        return redirect()->route('purchaseorders.index')->with('success', 'Purchase order deleted successfully.');
    }
}
