<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    use HasFactory;

    protected $primaryKey = 'SellCode';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'SellCode',
        'ItemCode',
        'ProductCode',
        'SupplierCode',
        'CustomerCode',
        'UnitPrice',
        'Tax',
        'TotalAmount',
        'Status',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
