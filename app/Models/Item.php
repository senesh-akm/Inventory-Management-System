<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'ItemCode';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ItemCode',
        'ItemPicture',
        'WarrantyDate',
        'ItemName',
        'ItemSerial',
        'ProductCode',
        'Description',
        'ReceiivedSupplier',
        'UnitPrice',
        'TaxStatus',
        'Tax',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
