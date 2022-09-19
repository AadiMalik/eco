<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::with(['user_name','state_name'])->get();
        return view('admin/city.index',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::orderBy('name','ASC')->get();
        return view('admin/city.create',compact('state'));
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
            'state' => 'required'
        ]);
        $city = new City;
        $city->name = $request->name;
        $city->state_id = $request->state;
        $city->user_id =  Auth()->user()->id;
        $city->save();
        return redirect('admin/city')->with('success', 'New City has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $state = State::orderBy('name','ASC')->get();
        return view('admin/city.create',compact('state','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'state' => 'required'
        ]);
        $city = City::find($id);
        $city->name = $request->name;
        $city->state_id = $request->state;
        $city->user_id =  Auth()->user()->id;
        $city->update();
        return redirect('admin/city')->with('success', 'City has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
