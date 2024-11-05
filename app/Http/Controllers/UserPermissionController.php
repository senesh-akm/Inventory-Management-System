<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.user-permission', compact('users'));
    }

    protected function permissions()
    {
        return [
            'dashboard' => 'Dashboard',
            'adjestment' => 'Adjustment',
            'customer' => 'Customer',
            'supplier' => 'Supplier',
            'item' => 'Item',
            'products' => 'Products',
            'product_category' => 'Product Category',
            'product' => 'Product',
            'purchase_order' => 'Purchase Order',
            'sales_order' => 'Sales Order',
            'store' => 'Store',
            'warehouse' => 'Warehouse',
            'stock_location' => 'Stock Location',
            'transaction' => 'Transaction',
            'settings' => 'Settings',
            'users' => 'Users',
            'user_permission' => 'User Permission',
            'theme' => 'Theme',
            'reports' => 'Reports',
            'sales_report' => 'Sales Report',
            'purchase_report' => 'Purchase Report'
        ];
    }

    public function getUserPermissions($id)
    {
        $userPermissions = UserPermission::where('user_id', $id)->first();

        if ($userPermissions) {
            $permissions = $userPermissions->only([
                'dashboard', 'adjestment', 'customer', 'supplier', 'item', 'products',
                'product_category', 'product', 'purchase_order', 'sales_order', 'store',
                'warehouse', 'stock_location', 'transaction', 'settings', 'users',
                'user_permission', 'theme', 'reports', 'sales_report', 'purchase_report'
            ]);
            return response()->json(['permissions' => $permissions]);
        }

        return response()->json(['permissions' => []], 404);
    }

    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $permissions = $request->input('permissions');

        $userPermissions = UserPermission::updateOrCreate(
            ['user_id' => $userId],
            [
                'dashboard' => !empty($permissions['dashboard']) ? 1 : 0,
                'adjestment' => !empty($permissions['adjestment']) ? 1 : 0,
                'customer' => !empty($permissions['customer']) ? 1 : 0,
                'supplier' => !empty($permissions['supplier']) ? 1 : 0,
                'item' => !empty($permissions['item']) ? 1 : 0,
                'products' => !empty($permissions['products']) ? 1 : 0,
                'product_category' => !empty($permissions['product_category']) ? 1 : 0,
                'product' => !empty($permissions['product']) ? 1 : 0,
                'purchase_order' => !empty($permissions['purchase_order']) ? 1 : 0,
                'sales_order' => !empty($permissions['sales_order']) ? 1 : 0,
                'store' => !empty($permissions['store']) ? 1 : 0,
                'warehouse' => !empty($permissions['warehouse']) ? 1 : 0,
                'stock_location' => !empty($permissions['stock_location']) ? 1 : 0,
                'transaction' => !empty($permissions['transaction']) ? 1 : 0,
                'settings' => !empty($permissions['settings']) ? 1 : 0,
                'users' => !empty($permissions['users']) ? 1 : 0,
                'user_permissions' => !empty($permissions['user_permission']) ? 1 : 0,
                'theme' => !empty($permissions['theme']) ? 1 : 0,
                'reports' => !empty($permissions['reports']) ? 1 : 0,
                'sales_report' => !empty($permissions['sales_report']) ? 1 : 0,
                'purchase_report' => !empty($permissions['purchase_report']) ? 1 : 0,
            ]
        );

        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }

    public function update(Request $request, $id)
    {
        $permissions = $request->input('permissions');

        $userPermissions = UserPermission::updateOrCreate(
            ['user_id' => $id],
            [
                'dashboard' => !empty($permissions['dashboard']) ? 1 : 0,
                'adjestment' => !empty($permissions['adjestment']) ? 1 : 0,
                'customer' => !empty($permissions['customer']) ? 1 : 0,
                'supplier' => !empty($permissions['supplier']) ? 1 : 0,
                'item' => !empty($permissions['item']) ? 1 : 0,
                'products' => !empty($permissions['products']) ? 1 : 0,
                'product_category' => !empty($permissions['product_category']) ? 1 : 0,
                'product' => !empty($permissions['product']) ? 1 : 0,
                'purchase_order' => !empty($permissions['purchase_order']) ? 1 : 0,
                'sales_order' => !empty($permissions['sales_order']) ? 1 : 0,
                'store' => !empty($permissions['store']) ? 1 : 0,
                'warehouse' => !empty($permissions['warehouse']) ? 1 : 0,
                'stock_location' => !empty($permissions['stock_location']) ? 1 : 0,
                'transaction' => !empty($permissions['transaction']) ? 1 : 0,
                'settings' => !empty($permissions['settings']) ? 1 : 0,
                'users' => !empty($permissions['users']) ? 1 : 0,
                'user_permission' => !empty($permissions['user_permission']) ? 1 : 0,
                'theme' => !empty($permissions['theme']) ? 1 : 0,
                'reports' => !empty($permissions['reports']) ? 1 : 0,
                'sales_report' => !empty($permissions['sales_report']) ? 1 : 0,
                'purchase_report' => !empty($permissions['purchase_report']) ? 1 : 0,
            ]
        );

        return response()->json(['success' => true]);
    }
}
