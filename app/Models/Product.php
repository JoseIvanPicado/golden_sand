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

    public function payment_method()
    {
        return $this->hasMany(Payment_method::class);
    }

    public function preparation_order()
    {
        return $this->hasMany(Preparation_order::class);
    }

    public function classification()
    {
        return $this->hasMany(Classification::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

}
