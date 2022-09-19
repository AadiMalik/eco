<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = Link::with('user_name')->get();
        return view('admin/link.index',compact('link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/link.create');
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
            'icon' => 'required|min:1|max:255',
            'link' => 'required|url|min:1'
        ]);
        $link = new link;
        $link->name = $request->name;
        $link->icon = $request->icon;
        $link->link = $request->link;
        $link->user_id =  Auth()->user()->id;
        $link->save();
        return redirect('admin/link')->with('success', 'New Social Media has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = Link::find($id);
        return view('admin/link.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'icon' => 'required|min:1|max:255',
            'link' => 'required|url|min:1|max:255'
        ]);
        $link = Link::find($id);
        $link->name = $request->name;
        $link->icon = $request->icon;
        $link->link = $request->link;
        $link->user_id =  Auth()->user()->id;
        $link->update();
        return redirect('admin/link')->with('success', 'Social Media has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
