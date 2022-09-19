<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function user_name(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function product_name(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function blog_name(){
        return $this->belongsTo('App\Models\Blog','blog_id');
    }
}
