<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::with(['user_name', 'country_name', 'state_name', 'city_name'])->get();

        return view('admin/address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::orderBy('id', 'DESC')->where('role', 2)->get();
        $country = Country::orderBy('name', 'ASC')->get();
        $state = State::orderBy('name', 'ASC')->get();
        $city = City::orderBy('name', 'ASC')->get();
        return view('admin/address.create', compact('user', 'country', 'state', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'user' => 'unique:addresses,user_id',
                'zip' => 'required|min:1|max:255',
                'address' => 'required|min:1|max:255'
            ]
        );
        $address = new Address;
        $address->user_id = $request->user;
        $address->country_id = $request->country;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->zipcode = $request->zip;
        $address->address = $request->address;
        $address->shipping = $request->shipping;
        $address->save();
        return redirect('admin/address')->with('success','User Address is created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::orderBy('id', 'DESC')->where('role', 2)->get();
        $country = Country::orderBy('name', 'ASC')->get();
        $state = State::orderBy('name', 'ASC')->get();
        $city = City::orderBy('name', 'ASC')->get();
        $address = Address::find($id)->first();
        return view('admin/address.edit', compact('user', 'country', 'state', 'city','address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'user' => 'required',
                'zip' => 'required|min:1|max:255',
                'address' => 'required|min:1|max:255'
            ]
        );
        $address = Address::find($id);
        $address->user_id = $request->user;
        $address->country_id = $request->country;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->zipcode = $request->zip;
        $address->address = $request->address;
        $address->shipping = $request->shipping;
        $address->update();
        return redirect('admin/address')->with('success','User Address is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
