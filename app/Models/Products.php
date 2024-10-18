<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'discount',
        'category',
        'product_details',
        'sizes',
        'quantity_S',
        'quantity_M',
        'quantity_L',
        'quantity_XL',
        'quantity_XXL',
        'image01',
        'image02',
        'image03',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
