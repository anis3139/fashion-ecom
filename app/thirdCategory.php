<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thirdCategory extends Model
{
    protected $fillable = ['category_id', 'sub_category_id', 'thirdCategoryName', 'page_title', 'description_title', 'description'];

    public function subCategory()
    {
        return $this->hasOne('App\subCategory', 'id', 'sub_category_id');
    }

    public function category()
    {
        return $this->hasOne('App\category', 'id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany(product::class);
    }
}
