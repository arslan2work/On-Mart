<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title' ,'slug', 'summary', 'description','additional_info','return_cancellation', 'stock', 'price', 'offer_price', 'discount', 'brand_id', 'conditions', 'status', 'photo','size_guide', 'user_id', 'cat_id', 'child_cat_id', 'size', 'added_by'];


    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    /**
     * Get all of the rel_prods for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rel_prods()  
    {
        return $this->hasMany('\App\Models\Product', 'cat_id', 'cat_id')->where('status','active')->limit(10);
    }

    public static function getProductByCart($id)
    {
        return self::where('id', $id)->get()->toArray();
    }

    public function orders()
    {
     return $this->belongsToMany(Order::class, 'product_orders')->withPivot('quantity');
    }
}
