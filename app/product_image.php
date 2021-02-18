<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $fillable = ['product_id', 'gallery'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
