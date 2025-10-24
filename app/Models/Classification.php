<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $table = 'classifications';

    protected $fillable = [
        'category_name',
        'description',
        'status',
        'creation_date',
        'modification_date',
        'reference_image',
        'by_user',
        'product_id'
    ]; 

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
