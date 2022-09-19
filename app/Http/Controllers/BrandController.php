<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::with(['user_name'])->get();

        return view('admin/brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10248'
        ]);
        $brand = new Brand;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $brand->image = $filename;
        }
        $brand->name = $request->name;
        $brand->user_id =  Auth()->user()->id;
        $brand->save();
        return redirect('admin/brand')->with('success', 'New Brand has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin/brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:10248'
        ]);
        $brand = Brand::find($id);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $brand->image = $filename;
        }
        $brand->name = $request->name;
        $brand->user_id =  Auth()->user()->id;
        $brand->update();
        return redirect('admin/brand')->with('success', 'Brand has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
