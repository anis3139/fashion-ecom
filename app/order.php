<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    /* payment status */
    const PENDING = 1;
    const PROCESSING = 2;
    const PAYMENT_NEEDED = 3;
    const CONFIRM = 4;
    const READY_FOR_SHIPPING = 5;
    const CANCEL = 6;
    const RETURN = 7;
    const REFUND = 8;
    const DELIVERY_COMPLETE = 9;

    /* shipping cost */
    const INSIDE = 50;
    const OUTSIDE = 100;

    protected $fillable = ['product_id', 'shipping_id', 'user_id', 'invoice', 'grandTotal', 'shiping', 'payment', 'month', 'year', 'date', 'trackingProduct', 'trxID', 'number', 'status'];

    public function products()
    {
        return $this->belongsTo(product::class);
    }

    public function productImage()
    {
        return $this->belongsTo(product_image::class);
    }

    public function orderNotes()
    {
        return $this->hasOne(OrderNote::class);
    }

    public function customerInfo()
    {
        return $this->hasOne(customer_info::class);
    }
}
