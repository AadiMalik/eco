<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Master;
use App\Models\Slave;
use Illuminate\Http\Request;

class SlaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slave = Slave::with(['user_name', 'product_name'])->where('status', 2)->get();
        return view('admin/slave.index', compact('slave'));
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
     * @param  \App\Models\Slave  $slave
     * @return \Illuminate\Http\Response
     */
    public function show(Slave $slave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slave  $slave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slave = Slave::find($id);
        return view('admin/slave.edit', compact('slave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slave  $slave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discount = 0;
        $subtotal=0;
        $validation = $request->validate(
            [
                'status' => 'required'
            ]
        );
        
        $slave = Slave::find($id);
        if($request->status==1){
            $shipping = Content::where('key', '#shipping')->first();
            $master = Master::where('invoice', $request->invoice)->first();
            $discount = ((int)$master->discount / (int)$master->sub_total) * 100;
            $subtotal=(int)$master->sub_total - (int)$slave->sub_total;
            $total = $subtotal - ($subtotal / 100) * ($discount);
            if ($subtotal >= (int)$shipping->heading) {
                $master->total = ceil($total);
            } else {
                $master->total = ceil($total + (int)$shipping->icon);
            }
            $master->sub_total = $subtotal;
            $master->discount = ($subtotal / 100) * ($discount);
            $master->qty = (int)$master->qty-(int)$slave->qty;
            $master->update();
        }
        
        $slave->status = $request->status;
        $slave->update();
        return redirect('admin/slave')->with('success', 'Product Order has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slave  $slave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slave $slave)
    {
        //
    }
}
