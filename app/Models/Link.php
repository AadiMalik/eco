<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    public function user_name(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
