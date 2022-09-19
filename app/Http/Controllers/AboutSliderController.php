<?php

namespace App\Http\Controllers;

use App\Models\AboutSlider;
use File;
use Illuminate\Http\Request;

class AboutSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = AboutSlider::with(['user_name'])->get();

        return view('admin/aboutslider.index', compact('images'));
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
                'file' => 'required|mimes:jpeg,png,jpg|max:10248'

            ]
        );
        $aboutslider = new AboutSlider;
        if($request->hasfile('file'))
        {
            $image = $request->file('file');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
        }
        $aboutslider->image = $filename;
        $aboutslider->user_id = Auth()->user()->id;
        $aboutslider->save();
        return back()->with('success', 'About Slider Images has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutSlider  $aboutSlider
     * @return \Illuminate\Http\Response
     */
    public function show(AboutSlider $aboutSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutSlider  $aboutSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutSlider $aboutSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutSlider  $aboutSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutSlider $aboutSlider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutSlider  $aboutSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $aboutSlider = AboutSlider::where('id',$request->id)->first();
        if(File::exists($aboutSlider->image)) {
            File::delete($aboutSlider->image);
        }
        AboutSlider::destroy($request->id);
        return response(['message' => 'About Slider Image delete successfully']);
    }
}
