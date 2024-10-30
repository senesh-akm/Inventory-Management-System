<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'TransactionCode'; // Set your primary key here
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'TransactionCode',
        'ItemCode',
        'Date',
        'Qty',
        'TransactionType',
        'StockLocation',
    ];
}
