<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Company;
use App\Models\Menu;
use App\Models\MicroMenu;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id','DESC')->with(['user_name','brand_name','category_name'])->get();
        return view('admin/product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand =Brand::orderBy('name','ASC')->get();
        $company =Company::orderBy('name','ASC')->get();
        $category = Menu::orderBy('name','ASC')->get();
        return view('admin/product.create',compact('brand','company','category'));
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
                'name' => 'required|min:1|max:255',
                'price' => 'required|min:1|max:255',
                'food' => 'required',
                'package' => 'required',
                'description' => 'required|min:1'
            ]
        );
        $product = new Product;
        if($request->discount!=null){
            $discount = ($request->price/100)*$request->discount;
            $product->price = $request->price-$discount;
            $product->pre_price = $request->price;
        }else{
            $product->price = $request->price;
        }
        $product->name = $request->name;
        $product->discount = $request->discount;
        $product->food = $request->food;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->package = $request->package;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->company_id = $request->company;
        $product->user_id = Auth()->user()->id;
        $product->save();
        return redirect('admin/product')->with('success','Product is created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand =Brand::orderBy('name','ASC')->get();
        $company =Company::orderBy('name','ASC')->get();
        $category = Menu::orderBy('name','ASC')->get();
        $product=Product::find($id);
        return view('admin/product.edit',compact('brand','company','category','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|min:1|max:255',
                'price' => 'required|min:1|max:255',
                'food' => 'required',
                'package' => 'required',
                'description' => 'required|min:1'
            ]
        );
        $product = Product::find($id);
        $product->name = $request->name;
        if($request->discount!=null){
            $discount = ($request->price/100)*$request->discount;
            $product->price = $request->price-$discount;
            $product->pre_price = $request->price;
        }else{
            $product->price = $request->price;
        }
        $product->discount = $request->discount;
        $product->food = $request->food;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->package = $request->package;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->company_id = $request->company;
        $product->user_id = Auth()->user()->id;
        $product->update();
        return redirect('admin/product')->with('success','Product is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
