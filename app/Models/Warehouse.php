<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $primaryKey = 'WarehouseCode';

    public $incrementing = false;

    protected $fillable = [
        'WarehouseCode',
        'WarehouseName',
        'Location',
    ];
}
