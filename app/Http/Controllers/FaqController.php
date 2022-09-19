<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::with('user_name')->where('type',1)->get();
        return view('admin/faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/faq.create');
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
        $faq = new Faq;
        $faq->heading = $request->heading;
        $faq->description = $request->description;
        $faq->type = 1;
        $faq->user_id =  Auth()->user()->id;
        $faq->save();
        return redirect('admin/faq')->with('success', 'New FAQ has created!');
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
        $faq = Faq::find($id);
        return view('admin/faq.edit',compact('faq'));
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
        $faq = Faq::find($id);
        $faq->heading = $request->heading;
        $faq->description = $request->description;
        $faq->type = 1;
        $faq->user_id =  Auth()->user()->id;
        $faq->update();
        return redirect('admin/faq')->with('success', 'FAQ has updated!');
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
        return response(['message' => 'FAQ delete successfully']);
    }
}
