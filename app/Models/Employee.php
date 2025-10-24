<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFatory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFatory;

    protected $perPage = 10;

    protected $fillable = [
        'employee_name',
        'date_of_birth',
        'gender',
        'nationality',
        'residence_departament',
        'address',
        'identification',
        'mail',
        'phone_number',
        'hire_date',
        'number_employee',
        'role_work',
        'role_work',
        'account_status'
    ];

    public function warehouse()
    {
        return $this->hasMany(warehouse::class);
    }
}
