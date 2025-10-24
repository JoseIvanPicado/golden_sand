<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $fillable = [
        'ingredient_name',
        'ingredient_description',
        'stock_quantity',
        'ingredient_status',
        'supplier',
        'purchase_date',        
        'unit_price',        
        'measurement_unit',        
        'total_cost'
    ];

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
