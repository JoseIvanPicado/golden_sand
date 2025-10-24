<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $fillable = [
        'item_name',
        'description',
        'description',
        'quantity',
        'location',
        'unitary_price',
        'supplier',
        'status_item',
        'expiration_date',
        'unit_measure',
        'added_by_user',
        'product_id',
        'employee_id',
        'order_detail_id',
        'ingredient_id'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }  

    public function order_details()
    {
        return $this->belongsTo(Order_detail::class);
    }

    public function ingredients()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
