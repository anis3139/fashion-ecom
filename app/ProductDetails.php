<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $fillable = ['product_id', 'details'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
