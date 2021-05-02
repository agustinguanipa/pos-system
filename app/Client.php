<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'cedula',
        'rif_number',
        'address',
        'phone',
        'email',
    ];
}
