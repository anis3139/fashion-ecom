<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer_info extends Model
{
    protected $fillable = ['user_id', 'order_id', 'name', 'number', 'address', 'gender', 'country_id', 'city_id', 'zipCode',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(order::class);
    }
}
