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
        'arrival_time',
        'employee_id',
        'client_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
