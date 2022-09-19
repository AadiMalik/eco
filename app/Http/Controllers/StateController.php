<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = state::with(['user_name','country_name'])->get();
        return view('admin/state.index',compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::orderBy('name','ASC')->get();
        return view('admin/state.create',compact('country'));
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
            'name' => 'required|min:1|unique:states|max:255',
            'country' => 'required'
        ]);
        $state = new state;
        $state->name = $request->name;
        $state->country_id = $request->country;
        $state->user_id =  Auth()->user()->id;
        $state->save();
        return redirect('admin/state')->with('success', 'New State has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show(state $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = state::find($id);
        $country = Country::orderBy('name','ASC')->get();
        return view('admin/state.edit',compact('state','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|unique:states|max:255',
            'country' => 'required'
        ]);
        $state = state::find($id);
        $state->name = $request->name;
        $state->country_id = $request->country;
        $state->user_id =  Auth()->user()->id;
        $state->update();
        return redirect('admin/state')->with('success', 'State has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(state $state)
    {
        //
    }
}
