<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $address = Address::where('user_id', auth()->user()->id)->first();
        $country = Country::all();
        $state = State::all();
        $city = City::all();
        return view('admin/user.profile', compact('address', 'country', 'state', 'city'));
    }
    public function info(Request $request)
    {

        $validation = $request->validate(
            [
                'fname' => 'required|min:1|max:255',
                'lname' => 'required|min:1|max:255',
                'address' => 'required',
                'zipcode' => 'required|min:1|max:255'
            ]
        );
        $user = User::find(auth()->user()->id);
        $address = Address::where('user_id', auth()->user()->id)->first();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        if ($address != null) {
            $address->country_id = $request->country;
            $address->state_id = $request->state;
            $address->city_id = $request->city;
            $address->address = $request->address;
            $address->shipping = $request->shipping;
            $address->zipcode = $request->zipcode;
            $address->update();
        } else {
            $addressadd = new Address;
            $addressadd->country_id = $request->country;
            $addressadd->state_id = $request->state;
            $addressadd->city_id = $request->city;
            $addressadd->address = $request->address;
            $addressadd->shipping = $request->shipping;
            $addressadd->zipcode = $request->zipcode;
            $addressadd->user_id = auth()->user()->id;
            $addressadd->save();
        }
        $user->update();
        return redirect('admin/dashboard')->with('success', 'Personal Information has updated!');
    }
    public function picture(Request $request)
    {
        $validation = $request->validate(
            [
                'image' => ['required','mimes:jpeg,png,jpg','max:10248'],
            ]
        );
        $picture = User::find(auth()->user()->id);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $picture->image = $filename;
        }
        $picture->update();
        return redirect('admin/dashboard')->with('success', 'Profile Picture has updated!');
    }
    public function password(Request $request)
    {
        $validation = $request->validate(
            [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
        $password = User::find(auth()->user()->id);
        $password->password=Hash::make($request->password);
        $password->update();
        return redirect('admin/dashboard')->with('success', 'Password has updated!');
    }
}
