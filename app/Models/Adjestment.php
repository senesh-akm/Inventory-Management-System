<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjestment extends Model
{
    use HasFactory;

    protected $primaryKey = 'ReturnCode';
    public $incrementing = false;

    protected $fillable = [
        'ReturnCode',
        'Customer',
        'ProductCode',
        'ItemCode',
        'ItemSerial',
        'ReturnDate',
        'Reason',
        'ReceivePerson'
    ];

    public function adjestment()
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
