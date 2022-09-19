<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    public function user_name(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function method_name(){
        return $this->belongsTo('App\Models\TransactionType','method_id');
    }
}
