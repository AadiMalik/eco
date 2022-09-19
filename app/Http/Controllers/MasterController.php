<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Master;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = Master::with(['user_name','method_name'])->get();
        $address = Address::all();
        $other = Shipping::all();
        return view('admin/master.index',compact('master','address','other'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::where('role',2)->get();
        $master = Master::with(['user_name','method_name'])->get();
        $address = Address::all();
        $other = Shipping::all();
        return view('admin/master.detail',compact('user','master','address','other'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = Master::find($id);
        return view('admin/master.edit',compact('master'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate(
            [
            'process' => 'required',
            'status' => 'required'
        ]);
        $master = Master::find($id);
        $master->process = $request->process;
        $master->status = $request->status;
        $master->update();
        return redirect('admin/master')->with('success', 'Order has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        //
    }
}
