<?php

namespace App\Http\Controllers;

use App\Models\MicroMenu;
use App\Models\MacroMenu;
use Illuminate\Http\Request;

class MicroMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $micromenu = MicroMenu::with('user_name')->get();
        return view('admin/micromenu.index',compact('micromenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $macromenu = MacroMenu::orderBy('name','ASC')->get();
        return view('admin/micromenu.create',compact('macromenu'));
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
            'macromenu' => 'required'
        ]);
        $micromenu = new MicroMenu;
        $micromenu->name = $request->name;
        $micromenu->macro_menu_id = $request->macromenu;
        $micromenu->user_id =  Auth()->user()->id;
        $micromenu->save();
        return redirect('admin/micromenu')->with('success', 'New Sub Category has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\micromenu  $micromenu
     * @return \Illuminate\Http\Response
     */
    public function show(micromenu $micromenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MicroMenu  $micromenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $micromenu = MicroMenu::find($id);
        $macromenu = MacroMenu::orderBy('name','ASC')->get();
        return view('admin/micromenu.edit',compact('macromenu','micromenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MicroMenu  $micromenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'macromenu' => 'required'
        ]);
        $micromenu = MicroMenu::find($id);
        $micromenu->name = $request->name;
        $micromenu->macro_menu_id = $request->macromenu;
        $micromenu->user_id =  Auth()->user()->id;
        $micromenu->update();
        return redirect('admin/micromenu')->with('success', 'Sub Category has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MicroMenu  $micromenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(MicroMenu $micromenu)
    {
        //
    }
}
