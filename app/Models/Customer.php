<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'CustomerCode',
        'Customer',
        'ContactTitle',
        'ContactName',
        'Address',
        'City',
        'PostalCode',
        'Country',
        'Phone',
        'Email'
    ];
}
