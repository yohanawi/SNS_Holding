<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'phone',
        'city',
        'street_address',
        'apt_suite_floor',
        'zip_code',
        'state_province',
        'user_id',
    ];
}
