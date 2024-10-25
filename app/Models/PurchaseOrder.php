<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'PurchaseOrderID',
        'SupplierCode',
        'ItemCode',
        'OrderDate',
        'Qty',
        'UnitPrice',
        'TotalAmount',
    ];
}
