<?php

namespace App\Http\Controllers;

use App\Models\CouponUse;
use Illuminate\Http\Request;

class CouponUseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couponuse = CouponUse::with(['user_name','coupon_name'])->get();
        return view('admin/couponuse.index',compact('couponuse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\CouponUse  $couponUse
     * @return \Illuminate\Http\Response
     */
    public function show(CouponUse $couponUse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponUse  $couponUse
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponUse $couponUse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CouponUse  $couponUse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponUse $couponUse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponUse  $couponUse
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponUse $couponUse)
    {
        //
    }
}
