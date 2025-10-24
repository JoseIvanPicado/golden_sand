<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'description',
        'unitary_price',
        'available_quantity',
        'sold_quantity',
        'total_price',
        'authorization_date',
        'payment_id',
        'order_id'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
