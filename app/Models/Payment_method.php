<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    protected $table = 'payment_methods';

    protected $fillable = [
        'method_name',
        'method_description',
        'type_typment',
        'status',
        'creation_date',
        'reference_transaction',
        'autorization_date',
        'registration_date',
        'commision'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
