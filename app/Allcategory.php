<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allcategory extends Model
{
    protected $table = "addcatagory";
    protected $fillable = [' category_id', 'cates','subcats','subcats2','published_at'];
    
    
}
