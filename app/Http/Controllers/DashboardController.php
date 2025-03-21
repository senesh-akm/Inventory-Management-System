<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
        $customersCount = Customer::count();

        return view('dashboard', compact('salesOrdersCount', 'purchaseOrdersCount', 'availableItemsCount', 'customersCount'));
    }
}
