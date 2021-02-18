<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    const PERCENTAGE = 1;
    const AMOUNT = 2;

    protected $fillable = ['coupon_name', 'coupon_discount', 'valid_date', 'discount_type'];
}
