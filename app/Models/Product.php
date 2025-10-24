<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $fillable = [
        'product_name',
        'product_description',
        'price',
        'weight',
        'stock_quantity',
        'product_status',
        'message',
        'reference_image'
    ];

    public function warehouse()
    {
        return $this->hasMany(warehouse::class);
    }
}
