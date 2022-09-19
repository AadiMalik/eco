<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier = Courier::with('user_name')->get();
        return view('admin/courier.index',compact('courier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/courier.create');
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
            'name' => 'required|min:1|unique:couriers,name|max:255',
            'phone' => 'required|min:1|max:255',
            'address' => 'required|min:1|max:255',
        ]);
        $courier = new Courier;
        $courier->name = $request->name;
        $courier->phone = $request->phone;;
        $courier->address = $request->address;
        $courier->user_id =  Auth()->user()->id;
        $courier->save();
        return redirect('admin/courier')->with('success', 'New Courier Service has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courier = Courier::find($id);
        return view('admin/courier.edit',compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|unique:couriers,name|max:255',
            'phone' => 'required|min:1|max:255',
            'address' => 'required|min:1|max:255',
        ]);
        $courier = Courier::find($id);
        $courier->name = $request->name;
        $courier->phone = $request->phone;;
        $courier->address = $request->address;
        $courier->user_id =  Auth()->user()->id;
        $courier->update();
        return redirect('admin/courier')->with('success', 'Courier Service has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        //
    }
}
