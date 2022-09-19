<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $payment = Payment::with(['user_name'])->get();

        return view('admin/payment.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/payment.create');
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
            'image' => 'image|mimes:jpeg,png,jpg|max:10248',
            'description' => 'required|min:1'
        ]);
        $payment = new Payment;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $payment->image = $filename;
        }
        $payment->heading = $request->heading;
        $payment->user_id =  Auth()->user()->id;
        $payment->description = $request->description;
        $payment->save();
        return redirect('admin/payment')->with('success', 'New Payment Information has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('admin/payment.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate(
            [
            'heading' => 'required|min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:10248',
            'description' => 'required|min:1'
        ]);
        $payment = Payment::find($id);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $payment->image = $filename;
        }
        $payment->heading = $request->heading;
        $payment->user_id =  Auth()->user()->id;
        $payment->description = $request->description;
        $payment->update();
        return redirect('admin/payment')->with('success', 'Payment Information has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
