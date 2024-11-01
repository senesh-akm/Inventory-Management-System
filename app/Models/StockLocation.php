<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'WarehouseCode',
        'ProductCode',
    ];

    public function stockLocation()
    {
        return $this->belongsTo(StockLocation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
