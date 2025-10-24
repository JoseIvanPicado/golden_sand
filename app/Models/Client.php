<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'nationality',
        'mail',
        'phone_number',
        'address',
        'registration_date',
        'account_status',
        'password'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function delivery()
    {
        return $this->hasMany(Delivery::class);
    }
}
