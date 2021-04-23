<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'email', 'rif_number', 'address', 'phone',
    ];

    public function providers() {
        return $this->hasMany(Product::class);
    }
}
