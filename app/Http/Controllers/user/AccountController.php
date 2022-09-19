<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Master;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\State;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $country = Country::orderBy('name', 'ASC')->get();
        $state = State::orderBy('name', 'ASC')->get();
        $city = City::orderBy('name', 'ASC')->get();
        $ship = Shipping::where('user_id', auth()->user()->id)->first();
        $product = Product::all();
        $address = Address::where('user_id', auth()->user()->id)->first();
        $transactiontype = TransactionType::orderBy('id', 'DESC')->get();
        $transaction = Transaction::where('user_id', auth()->user()->id)->where('status',2)->get();
        $master = Master::with(['user_name','method_name'])->get();
        $payment = Payment::orderBy('id','DESC')->get();
        // dd($ship);
        return view('user/profile', compact(
            'country',
            'state',
            'city',
            'ship',
            'product',
            'address',
            'transactiontype',
            'transaction',
            'master',
            'payment'
        ));
    }
    public function profile(Request $request)
    {
        $validation = $request->validate(
            [
                'fname' => 'required|min:1|max:255',
                'lname' => 'required|min:1|max:255',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zipcode' => 'required|min:1|max:255',
                'address' => 'required|min:1|max:255',
            ]
        );
        $user = User::find(auth()->user()->id);
        $address = Address::where('user_id', auth()->user()->id)->first();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $address->country_id = $request->country;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->zipcode = $request->zipcode;
        $address->address = $request->address;
        $address->shipping = $request->shipping;
        $user->update();
        $address->update();
        return back()->with('success', 'Personal Info has updated!');
    }
    public function picture(Request $request)
    {

        $validation = $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:10248'
            ]
        );

        $user = User::find(auth()->user()->id);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $user->image = $filename;
        }
        $user->update();
        return back()->with('success', 'Profile Picture has updated!');
    }
    public function password(Request $request)
    {
        $validation = $request->validate(
            [
                'password' => 'required|min:8|max:32',
                'confirm_password' => 'required|min:8|max:32'
            ]
        );
        $user = User::find(auth()->user()->id);
        if ($request->password == $request->confirm_password) {
            $user->password = Hash::make($request->password);
            $user->update();
            return back()->with('success', 'Your Password has updated!');
            $user->update();
        } else {
            return back()->with('error', 'Password Not Match!');
        }
    }
    public function shipping(Request $request)
    {
        $validation = $request->validate(
            [
                'fname' => 'required|min:1|max:255',
                'lname' => 'required|min:1|max:255',
                'email' => 'required|min:1|max:255',
                'lname' => 'required|min:1|max:255',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zipcode' => 'required|min:1|max:255',
                'address' => 'required|min:1|max:255',
            ]
        );
        $shipping = Shipping::where('user_id', auth()->user()->id)->first();
        if ($shipping != null) {
            $shipping->fname = $request->fname;
            $shipping->lname = $request->lname;
            $shipping->email = $request->email;
            $shipping->phone = $request->phone;
            $shipping->country_id = $request->country;
            $shipping->state_id = $request->state;
            $shipping->city_id = $request->city;
            $shipping->zipcode = $request->zipcode;
            $shipping->address = $request->address;
            $shipping->user_id = auth()->user()->id;
            $shipping->update();
            return back()->with('success', 'Shipping Address has updated!');
        } else {
            $shipping = new Shipping;
            $shipping->fname = $request->fname;
            $shipping->lname = $request->lname;
            $shipping->email = $request->email;
            $shipping->phone = $request->phone;
            $shipping->country_id = $request->country;
            $shipping->state_id = $request->state;
            $shipping->city_id = $request->city;
            $shipping->zipcode = $request->zipcode;
            $shipping->address = $request->address;
            $shipping->user_id = auth()->user()->id;
            $shipping->save();
            return back()->with('success', 'Shipping Address has created!');
        }
    }

    public function addtransaction(Request $request)
    {

        $validation = $request->validate(
            [
                'invoice' => 'required|min:1|max:255',
                'method' => 'required',
                'id' => 'required|min:1|max:255',
                'amount' => 'required|min:1|max:255',
                'slip' => 'required|image|mimes:jpeg,png,jpg|max:10248'
            ]
        );

        $transaction = new Transaction;
        if ($request->hasfile('slip')) {
            $image = $request->file('slip');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $transaction->slip = $filename;
        }
        $transaction->user_id = auth()->user()->id;
        $transaction->invoice = $request->invoice;
        $transaction->type_id = $request->method;
        $transaction->transaction = $request->id;
        $transaction->amount = $request->amount;
        $transaction->reason = 'Admin will confirm Your Payment Thanks!';
        $transaction->save();
        return back()->with('success', 'Your Transaction has created!');
    }
    public function transationdelete($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status=1;
        $transaction->reason='User has Transaction Removed!';
        $transaction->update();
        return back()->with('success', 'Transaction has Removed!');
    }
    public function cancelorder($id)
    {
        $master = Master::find($id);
        $master->status=1;
        $master->process=4;
        $master->update();
        return back()->with('success', 'Order has Cancel!');
    }
}
