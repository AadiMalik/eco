<?php

namespace App\Http\Controllers;

use App\Models\MacroMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class MacroMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $macromenu = MacroMenu::with(['user_name','menu_name'])->get();
        return view('admin/macromenu.index',compact('macromenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::orderBy('name','ASC')->get();
        return view('admin/macromenu.create',compact('menu'));
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
            'menu' => 'required'
        ]);
        $macromenu = new MacroMenu;
        $macromenu->name = $request->name;
        $macromenu->menu_id = $request->menu;
        $macromenu->user_id =  Auth()->user()->id;
        $macromenu->save();
        return redirect('admin/macromenu')->with('success', 'New Category has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MacroMenu  $macroMenu
     * @return \Illuminate\Http\Response
     */
    public function show(MacroMenu $macroMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MacroMenu  $macroMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $macromenu = MacroMenu::find($id);
        $menu = Menu::orderBy('name','ASC')->get();
        return view('admin/macromenu.edit',compact('menu','macromenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MacroMenu  $macroMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'menu' => 'required'
        ]);
        $macromenu = MacroMenu::find($id);
        $macromenu->name = $request->name;
        $macromenu->menu_id = $request->menu;
        $macromenu->user_id =  Auth()->user()->id;
        $macromenu->update();
        return redirect('admin/macromenu')->with('success', 'Category has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MacroMenu  $macroMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(MacroMenu $macroMenu)
    {
        //
    }
}
