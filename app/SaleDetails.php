<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    protected $fillable = [
        'sale_id',
        'product_id',
        'discount',
        'quantity',
        'price',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
