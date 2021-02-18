<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productAttr extends Model
{
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
