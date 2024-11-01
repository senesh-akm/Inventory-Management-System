<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dashboard',
        'adjestment',
        'customer',
        'supplier',
        'item',
        'products',
        'product_category',
        'product',
        'purchase_order',
        'sales_order',
        'store',
        'warehouse',
        'stock_location',
        'transaction',
        'settings',
        'users',
        'user_permission',
        'theme',
        'reports',
        'sales_report',
        'purchase_report',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
