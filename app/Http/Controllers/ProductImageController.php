<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;
use File;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productimage = ProductImage::with(['user_name', 'product_name'])->get();
        $product = Product::orderBy('name', 'ASC')->get();
        return view('admin/productimage.index', compact('productimage', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'product' => 'required',
                'file' => 'required|mimes:jpeg,png,jpg|max:10248'

            ]
        );
        $productimage = new ProductImage;
        if ($request->hasfile('file')) {
            $image = $request->file('file');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
        }
        $productimage->product_id = $request->product;
        $productimage->image = $filename;
        $productimage->user_id = Auth()->user()->id;
        $productimage->save();
        return back()->with('success', 'Product Image has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productimage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductImage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $productimage = ProductImage::where('id',$request->id)->first();
        if(File::exists($productimage->image)) {
            File::delete($productimage->image);
        }
        ProductImage::destroy($request->id);
        return response(['message' => 'Product Image delete successfully']);
    }
}
