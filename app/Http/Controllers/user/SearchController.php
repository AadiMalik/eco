<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = Product::where('name',  'LIKE', "%{$request->search}%")
            ->orWhere('price',  'LIKE', "%{$request->search}%")
            ->orWhere('sale',  'LIKE', "%{$request->search}%")
            ->orWhere('price',  'LIKE', "%{$request->search}%")
            ->orWhere('description',  'LIKE', "%{$request->search}%")
            ->orWhere('pair',  'LIKE', "%{$request->search}%")
            ->get();
        $productimage = ProductImage::all();
        $rating = Comment::all();
        $link = Link::orderBy('id', 'DESC')->get();
        return view('user/search', compact('search', 'productimage', 'rating','link'));
    }
    public function category($id)
    {
        $search = Product::where('micro_menu_id',  'LIKE', "%{$id}%")
            ->orWhere('sale',  'LIKE', "%{$id}%")
            ->get();
        $productimage = ProductImage::all();
        $rating = Comment::all();
        $link = Link::orderBy('id', 'DESC')->get();
        return view('user/search', compact('search', 'productimage', 'rating','link'));
    }
    public function brand($id)
    {
        $search = Product::where('brand_id',  'LIKE', "%{$id}%")->get();
        $productimage = ProductImage::all();
        $rating = Comment::all();
        $link = Link::orderBy('id', 'DESC')->get();
        return view('user/search', compact('search', 'productimage', 'rating','link'));
    }
    public function color($id)
    {
        $color = ProductColor::where('color_id',$id)->get();
        
        $search = Product::all();
        $productimage = ProductImage::all();
        $rating = Comment::all();
        $link = Link::orderBy('id', 'DESC')->get();
        return view('user/bycolor', compact('search','color', 'productimage', 'rating','link'));
    }
    public function size($id)
    {
        $size = ProductSize::where('size_id',$id)->get();
        
        $search = Product::all();
        $productimage = ProductImage::all();
        $rating = Comment::all();
        $link = Link::orderBy('id', 'DESC')->get();
        return view('user/bysize', compact('search','size', 'productimage', 'rating','link'));
    }
}
