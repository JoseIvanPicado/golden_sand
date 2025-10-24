<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preparation_order extends Model
{
    protected $table = 'preparation_orders';

    protected $fillable = [
        'end_time',
        'preparation_date',
        'preparation_time',
        'status',
        'observations',
        'priority_level',
        'assigned_to',
        'amount_items',
        'start_time',
        'assignment_date',
        'products_id',
        'employees_id'       
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
