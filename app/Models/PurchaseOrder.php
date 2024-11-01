<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'PurchaseOrderID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'PurchaseOrderID',
        'Status',
        'SupplierCode',
        'ItemCode',
        'OrderDate',
        'Qty',
        'UnitPrice',
        'Is_Tax',
        'Tax',
        'TotalAmount',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
