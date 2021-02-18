<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['category_name', 'page_title', 'description_title', 'description', 'status'];

    public function subCategory()
    {
        return $this->hasMany('App\subCategory');
    }
    public function thirdCategory()
    {
        return $this->hasMany('App\thirdCategory');
    }
    public function products()
    {
        return $this->hasMany('App\product')->where('status', 1);
    }
}
