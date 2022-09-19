<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavbarController extends Controller
{
    public function getcart()
    {
        if(auth()->user()!=null)
        {
        $cartdata = Cart::where('user_id', auth()->user()->id)->get();
        // Fetch all records
        $cart['data'] = $cartdata;

        echo json_encode($cart);
        exit;
        }
    }
}
