<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = Faq::with('user_name')->where('type',2)->get();
        return view('admin/term.index',compact('term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/term.create');
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
            'description' => 'required|min:1'
        ]);
        $term = new Faq;
        $term->heading = $request->heading;
        $term->description = $request->description;
        $term->type = 2;
        $term->user_id =  Auth()->user()->id;
        $term->save();
        return redirect('admin/term')->with('success', 'New Term & Condition has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Faq::find($id);
        return view('admin/term.edit',compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'heading' => 'required|min:1|max:255',
            'description' => 'required|min:1'
        ]);
        $term = Faq::find($id);
        $term->heading = $request->heading;
        $term->description = $request->description;
        $term->type = 2;
        $term->user_id =  Auth()->user()->id;
        $term->update();
        return redirect('admin/term')->with('success', 'Term & Condition has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Faq::destroy($request->id);
        return response(['message' => 'Term & Condition delete successfully']);
    }
}
