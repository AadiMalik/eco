<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $content = Content::with(['user_name'])->get();

        return view('admin/content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/content.create');
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
                'heading' => 'required|min:1|max:255',
                'key' => 'required|unique:contents,key|min:1|max:255',
                'image' => 'image|mimes:jpeg,png,jpg|max:10248'
            ]
        );
        $content = new Content;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $content->image = $filename;
        } 
        $content->name = $request->name;
        $content->heading = $request->heading;
        $content->icon = $request->icon;
        $content->key = $request->key;
        $content->user_id =  Auth()->user()->id;
        $content->description = $request->description;
        $content->save();
        return redirect('admin/content')->with('success', 'New Content has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        return view('admin/content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|min:1|max:255',
                'heading' => 'required|min:1|max:255',
                'image' => 'image|mimes:jpeg,png,jpg|max:10248'
            ]
        );
        $content = Content::find($id);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $content->image = $filename;
        } 
        $content->name = $request->name;
        $content->heading = $request->heading;
        $content->icon = $request->icon;
        $content->user_id =  Auth()->user()->id;
        $content->description = $request->description;
        $content->update();
        return redirect('admin/content')->with('success', 'Content has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
