<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'company',
        'email',
        'phone_number',
        'street_address',
        'street_address_2',
        'city',
        'state',
        'zip_code'
    ];
}
