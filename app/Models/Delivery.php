<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    protected $fillable = [
        'available_status',
        'assigned_zone',
        'delivery_person',
        'admission_date',
        'departure_time',
        'arrival_time'
    ];
}
