<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'CategorName';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'CategorName',
        'Description'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
