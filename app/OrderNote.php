<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
    protected $fillable = ['order_id', 'note'];

    public function order()
    {
        return $this->belongsTo(order::class);
    }
}
