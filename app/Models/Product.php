<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'barcode',
        'price',
        'medicine_type',
        'quantity',
        'dosage',
        'status',
    ];
}
