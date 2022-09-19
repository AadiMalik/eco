<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::with(['user_name'])->get();

        return view('admin/service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/service.create');
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
        $service = new Service;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $service->image = $filename;
        }
        $service->name = $request->name;
        $service->user_id =  Auth()->user()->id;
        $service->save();
        return redirect('admin/service')->with('success', 'New Service has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin/service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:10248'
        ]);
        $service = Service::find($id);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $service->image = $filename;
        }
        $service->name = $request->name;
        $service->user_id =  Auth()->user()->id;
        $service->update();
        return redirect('admin/service')->with('success', 'Service has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
