<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::with(['user_name'])->get();

        return view('admin/team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/team.create');
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
            'profession' => 'required|min:1|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10248'
        ]);
        $team = new Team;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $team->image = $filename;
        }
        $team->name = $request->name;
        $team->profession = $request->profession;
        $team->gmail = $request->gmail;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->user_id =  Auth()->user()->id;
        $team->save();
        return redirect('admin/team')->with('success', 'New Team Member has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin/team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'profession' => 'required|min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:10248'
        ]);
        $team = Team::find($id);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $team->image = $filename;
        }
        $team->name = $request->name;
        $team->profession = $request->profession;
        $team->gmail = $request->gmail;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->update();
        return redirect('admin/team')->with('success', 'Team Member has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
