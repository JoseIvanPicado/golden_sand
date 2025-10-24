<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $fillable = [
        'transaction_reference',
        'payment_date',
        'total_amount',
        'payment_method',
        'amount_paid',
        'change',
        'authorization_code',
        'authorization_date',
        'point_terminal',
        'payment_status',
        'commision',
        'due_date'
    ];

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function payment_method()
    {
        return $this->hasMany(Payment_method::class);
    }

}
