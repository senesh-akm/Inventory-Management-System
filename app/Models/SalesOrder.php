<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'SalesOrderID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'SalesOrderID',
        'Status',
        'CustomerCode',
        'ProductCode',
        'ItemCode',
        'OrderDate',
        'Qty',
        'UnitPrice',
        'Is_Tax',
        'Tax',
        'TotalAmount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
