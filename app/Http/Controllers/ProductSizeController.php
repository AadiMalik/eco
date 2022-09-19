<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsize = ProductSize::with('user_name')->get();
        return view('admin/productsize.index', compact('productsize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = Size::orderBy('id', 'DESC')->get();
        $product = Product::orderBy('id', 'DESC')->get();
        return view('admin/productsize.create', compact('size', 'product'));
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
                'size' => 'required|min:1|max:255',
                'product' => 'required'
            ]
        );
        $productsize = new ProductSize;
        $productsize->size_id = $request->size;
        $productsize->product_id = $request->product;
        $productsize->user_id =  Auth()->user()->id;
        $productsize->save();
        return redirect('admin/productsize')->with('success', 'New Prodcut Size has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSize $productsize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productsize=ProductSize::find($id);
        $size = Size::orderBy('id', 'ASC')->get();
        $product = Product::orderBy('id', 'DESC')->get();
        return view('admin/productsize.edit', compact('productsize','size', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation = $request->validate(
            [
                'size' => 'required|min:1|max:255',
                'product' => 'required'
            ]
        );
        $productsize = ProductSize::find($id);
        $productsize->size_id = $request->size;
        $productsize->product_id = $request->product;
        $productsize->user_id =  Auth()->user()->id;
        $productsize->update();
        return redirect('admin/productsize')->with('success', 'Prodcut Size has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSize $productsize)
    {
        //
    }
}
