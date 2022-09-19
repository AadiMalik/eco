<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table= "carts";
    protected $fillable=["product_id","qty","colors","sizes","user_id"];
    public function user_name(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function product_name(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function color_name(){
        return $this->belongsTo('App\Models\ProductColor','color_id');
    }
    public function size_name(){
        return $this->belongsTo('App\Models\ProductSize','size_id');
    }
    public function coupon_name(){
        return $this->belongsTo('App\Models\Coupon','coupon_id');
    }
}
