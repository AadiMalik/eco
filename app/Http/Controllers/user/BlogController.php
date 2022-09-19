<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::orderBy('id','DESC')->get();
        $tag = DB::table('products')
            ->select('sale')
            ->distinct()->get();
        $products = Product::orderBy('id','DESC')->get();
        $productimage = ProductImage::all();
        $rating = Comment::whereNull('blog_id')->get();
        $comment=Comment::all();

        return view('user/blog', compact('blog', 'tag','products','productimage','rating','comment'));
    }
}
