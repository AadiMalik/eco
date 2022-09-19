<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function user_name(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function brand_name(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
    public function category_name(){
        return $this->belongsTo(Menu::class, 'category_id');
    }
    public function company_name()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }
}
