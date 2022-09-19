<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    public function user_name(){
        return $this->belongsTo('App\Models\User','user_id');
     }
     public function country_name(){
        return $this->belongsTo('App\Models\Country','country_id');
     }
     public function state_name(){
        return $this->belongsTo('App\Models\State','state_id');
     }
     public function city_name(){
        return $this->belongsTo('App\Models\City','city_id');
     }
}
