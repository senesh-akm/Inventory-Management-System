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
        'Quantity',
        'Reason',
        'ReceivePerson'
    ];
}
