<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Cart;
use App\Models\Wish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($id)
    {
        $detail = Product::find($id);
        $product = Product::orderBy('id', 'DESC')->get();
        $productimage = ProductImage::all();
        $productcolor = ProductColor::all();
        $productsize = ProductSize::all();
        $rating = Comment::whereNull('blog_id')->get();
        $comment = Comment::all();
        $tag = DB::table('products')
            ->select('sale')
            ->distinct()->get();
        $link = Link::orderBy('id', 'DESC')->get();
        return view('user/detail', compact(
            'detail',
            'product',
            'productimage',
            'rating',
            'comment',
            'productcolor',
            'productsize',
            'tag',
            'link'
        ));
    }
    public function store(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'message' => 'required|min:1|max:455',
                'rate' => 'required'
            ]
        );
        $comment = new Comment;
        $comment->product_id = $id;
        $comment->rating = $request->rate;
        $comment->description = $request->message;
        $comment->user_id =  Auth()->user()->id;
        $comment->save();
        return back();
    }
    public function cart(Request $request)
    {
        $find = Cart::where('product_id', $request->product_id)->where('user_id', $request->user_id)->first();
        if ($find != null && $find->colors==null && $find->sizes==null) {
            $find->qty = $find->qty + 1;
            $find->update();
            return redirect('user/cart');
        } else {
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            if($request->color!=null){
                $cart->colors = serialize($request->color);
            } 
            if($request->size!=null){
                $cart->sizes = serialize($request->size);
            }
            $cart->qty = 1;
            $cart->user_id = auth()->user()->id;
            $cart->save();
            return redirect('user/cart');
        }
    }
    public function wish(Request $request, $id)
    {
        $wish = new Wish;
        $wish->product_id = $id;
        $wish->user_id =  Auth()->user()->id;
        $wish->save();
        return back();
    }
}
