<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    protected $table = 'payment_methods';

    protected $fillable = [
        'method_name',
        'method_description',
        'method_status'
    ];

    
}
