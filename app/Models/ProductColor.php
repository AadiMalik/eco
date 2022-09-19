<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    public function user_name(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function product_name(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function color_name(){
        return $this->belongsTo('App\Models\Color','color_id');
    }
}
