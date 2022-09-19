<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Wish;

class WishController extends Controller
{
    public function index(){
        $wish = Wish::orderBy('id','DESC')->with('product_name')->where('user_id',auth()->user()->id)->get();
        $productimage=ProductImage::all();
        return view('user/wishlist',compact('wish','productimage'));
    }
    public function add(Request $request)
    {
            $wish = new Wish;
            $wish->product_id = $request->product_id;
            $wish->user_id = $request->user_id;
            $wish->save();
            return response()->json(['success' => 'Product is add to Wishlist']);
        
    }
    public function remove(Request $request)
    {
            $wish = Wish::where('product_id',$request->product_id)->where('user_id',$request->user_id)->first();
            $wish->delete(); 
            return response()->json(['success' => 'Product has Removed']);
        
    }
}
