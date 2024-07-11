<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'SupplierCode',
        'Supplier',
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
