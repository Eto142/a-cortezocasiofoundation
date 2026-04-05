<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'name', 'email', 'zip_code', 'phone',
        'amount', 'frequency', 'message', 'status',
    ];
}
