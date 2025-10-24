<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_status',
        'order_date',
        'order_time',
        'delivery_type',
        'delivery_address',
        'estimated_time',
        'quantity',
        'unit_price',
        'total_amount',
        'delivery_status',
        'client_id',
        'order_details_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }
}
