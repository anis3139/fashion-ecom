<?php

namespace App;

use Nicolaslopezj\Searchable\SearchableTrait;
// use Nicolaslopezj\Searchable\SearchableTrait as SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    const ATTACH_UPLOAD_PATH = 'upload/product';

    protected $fillable = ['id', 'name', 'categorry_id', 'sub_category_id', 'thirdCategory_id', 'product_name', 'details', 'price', 'offer_price', 'product_code', 'slug', 'image', 'quantity', 'status', 'hot_deal', 'sellerName', 'sellerId'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.product_name' => 10,
            'products.details' => 10
        ]
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(subCategory::class);
    }

    public function thirdCategory()
    {
        return $this->belongsTo(thirdCategory::class, 'thirdCategory_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany('App\cart');

    }

    public function productImage()
    {
        return $this->hasOne(product_image::class);
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetails::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(productAttr::class);
    }

}
