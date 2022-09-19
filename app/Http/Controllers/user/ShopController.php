<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->paginate(15);
        $productimage = ProductImage::all();
        $rating = Comment::all();
        $link = Link::all();
        $tag = DB::table('products')
            ->select('sale')
            ->distinct()->get();
        $colors = Color::orderBy('id','DESC')->get();
        $sizes =Size::orderBy('id','DESC')->get();
        return view('user/shop', compact(
            'product',
            'productimage',
            'rating',
            'link',
            'tag',
            'colors',
            'sizes' 
        ));
    }
}
