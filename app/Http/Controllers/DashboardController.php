<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $salesOrdersCount = SalesOrder::count();
        $purchaseOrdersCount = PurchaseOrder::count();
        $availableItemsCount = Item::count();

        return view('home', compact('salesOrdersCount', 'purchaseOrdersCount', 'availableItemsCount'));
    }
}
