<?php

namespace App\Http\Controllers;

use App\Models\ProductColor;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcolor = ProductColor::with('user_name')->get();
        return view('admin/productcolor.index', compact('productcolor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color = Color::orderBy('id', 'DESC')->get();
        $product = Product::orderBy('id', 'DESC')->get();
        return view('admin/productcolor.create', compact('color', 'product'));
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
                'color' => 'required|min:1|max:255',
                'product' => 'required'
            ]
        );
        $productcolor = new ProductColor;
        $productcolor->color_id = $request->color;
        $productcolor->product_id = $request->product;
        $productcolor->user_id =  Auth()->user()->id;
        $productcolor->save();
        return redirect('admin/productcolor')->with('success', 'New Prodcut Color has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function show(ProductColor $productColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productcolor=ProductColor::find($id);
        $color = Color::orderBy('id', 'ASC')->get();
        $product = Product::orderBy('id', 'DESC')->get();
        return view('admin/productcolor.edit', compact('productcolor','color', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation = $request->validate(
            [
                'color' => 'required|min:1|max:255',
                'product' => 'required'
            ]
        );
        $productcolor = ProductColor::find($id);
        $productcolor->color_id = $request->color;
        $productcolor->product_id = $request->product;
        $productcolor->user_id =  Auth()->user()->id;
        $productcolor->update();
        return redirect('admin/productcolor')->with('success', 'Prodcut Color has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductColor $productColor)
    {
        //
    }
}
