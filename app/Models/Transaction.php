<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'TransactionCode';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'TransactionCode',
        'ItemCode',
        'ItemSerial',
        'Date',
        'TransactionType',
        'StockLocation',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function stockLocation()
    {
        return $this->belongsTo(StockLocation::class);
    }
}
