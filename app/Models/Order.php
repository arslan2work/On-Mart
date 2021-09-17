<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','order_number','sub_total','total_amount','coupon','payment_method','payment_status','condition','delivery_charge',
                            'first_name','last_name','email','phone','country','address','city','state','note','postcode',
                            'sfirst_name','slast_name','semail','sphone','scountry','saddress','scity','sstate','spostcode'];


    public function products()
    {
     return $this->belongsToMany(Product::class, 'product_orders')->withPivot('quantity');
    }
}
