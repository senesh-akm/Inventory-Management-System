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
        'CustomerCode',
        'ProductCode',
        'ItemCode',
        'OrderDate',
        'Qty',
        'UnitPrice',
        'TotalAmount',
    ];
}
