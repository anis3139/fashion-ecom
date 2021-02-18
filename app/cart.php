<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    function product()
  {
  // return $this->hasMany('App\product', 'id', 'product_id');
  return $this->hasOne('App\product', 'id', 'product_id');

  }
}
