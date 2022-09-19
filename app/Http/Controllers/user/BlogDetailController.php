<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class BlogDetailController extends Controller
{
    public function index($id)
    {
        $blogdetail=Blog::find($id);
        $blog = Blog::orderBy('id','DESC')->get();
        $tag = DB::table('products')
            ->select('sale')
            ->distinct()->get();
        $products = Product::orderBy('id','DESC')->get();
        $productimage = ProductImage::all();
        $rating = Comment::whereNull('blog_id')->get();
        $comment=Comment::all();

        return view('user/blogdetail', compact('blog', 'tag','products','productimage','rating','comment','blogdetail'));
    }
    public function store(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'message' => 'required|min:1|max:455'
        ]);
        $comment = new Comment;
        $comment->blog_id = $id;
        $comment->description = $request->message;
        $comment->user_id =  Auth()->user()->id;
        $comment->save();
        return back();
    }
}
