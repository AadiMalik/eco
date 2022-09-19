<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blog = Blog::with(['user_name'])->get();

        return view('admin/blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blog.create');
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
            'heading' => 'required|min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:10248',
            'description' => 'required|min:1'
        ]);
        $blog = new Blog;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $blog->image = $filename;
        }else{
            $blog->link = $request->link;
        }
        $blog->name = $request->heading;
        $blog->user_id =  Auth()->user()->id;
        $blog->important = $request->important;
        $blog->description = $request->description;
        $blog->save();
        return redirect('admin/blog')->with('success', 'New Blog has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = BLog::find($id);
        return view('admin/blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate(
            [
            'heading' => 'required|min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:10248',
            'description' => 'required|min:1'
        ]);
        $blog = Blog::find($id);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $blog->image = $filename;
        }else{
            $blog->link = $request->link;
        }
        $blog->name = $request->heading;
        $blog->user_id =  Auth()->user()->id;
        $blog->important = $request->important;
        $blog->description = $request->description;
        $blog->update();
        return redirect('admin/blog')->with('success', 'Blog has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
