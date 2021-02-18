<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class billing_detail extends Model
{
    public function products()
    {
        return $this->hasOne('App\product', 'id', 'product_id');
    }

    public function productImage()
    {
        return $this->hasOne(product_image::class);
    }
}
