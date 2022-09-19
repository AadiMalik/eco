<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = Coupon::with('user_name')->get();
        return view('admin/coupon.index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/coupon.create');
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
            'name' => 'required|min:1|unique:coupons,name|max:255',
            'expire' => 'required|min:1|max:255',
            'discount' => 'required|min:1|max:2',
        ]);
        $coupon = new Coupon;
        $coupon->name = $request->name;
        $coupon->start = Carbon::now();
        $coupon->expire = $request->expire;
        $coupon->discount = $request->discount;
        $coupon->user_id =  Auth()->user()->id;
        $coupon->save();
        return redirect('admin/coupon')->with('success', 'New Coupon has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin/coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=$request->validate(
            [
            'name' => 'required|min:1|max:255',
            'expire' => 'required|min:1|max:255',
            'discount' => 'required|min:1|max:2',
        ]);
        $coupon = Coupon::find($id);
        $coupon->name = $request->name;
        $coupon->status = $request->status;
        $coupon->expire = $request->expire;
        $coupon->discount = $request->discount;
        $coupon->user_id =  Auth()->user()->id;
        $coupon->update();
        return redirect('admin/coupon')->with('success', 'Coupon has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
