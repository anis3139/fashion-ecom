<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    protected $fillable = ['category_id', 'subCategory_name', 'page_title', 'description_title', 'description', 'subCategory_des'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function thirdCategory()
    {
        return $this->hasMany('App\thirdCategory')->orderBy('updated_at', 'desc');
    }

    public function products()
    {
        return $this->hasMany('App\product')->orderBy('updated_at', 'desc');
    }

}
