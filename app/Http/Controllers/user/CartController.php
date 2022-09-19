<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\Content;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\CouponUse;
use App\Models\Shipping;
use App\Models\State;
use App\Models\TransactionType;
use App\Models\Master;
use App\Models\Slave;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $useraddress = Address::where('user_id', auth()->user()->id)->first();
        $shipping = Shipping::where('user_id', auth()->user()->id)->first();
        $transactiontype = TransactionType::all();
        $country = Country::orderBy('name')->get();
        $state = State::orderBy('name')->get();
        $city = City::orderBy('name')->get();
        return view('user/cart', compact(
            'cart',
            'shipping',
            'transactiontype',
            'country',
            'state',
            'city',
            'useraddress',
        ));
    }
    public function add(Request $request)
    {
        $find = Cart::where('product_id', $request->product_id)->where('user_id', $request->user_id)->first();
        if ($find != null) {
            $find->qty = $find->qty + 1;

            $find->update();
            return response()->json(['success' => 'Product is add to Cart']);
        } else {
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->qty = $request->qty;
            $cart->user_id = $request->user_id;
            $cart->save();
            return response()->json(['success' => 'Product is add to Cart']);
        }
    }
    public function update(Request $request)
    {
        $validation = $request->validate(
            [
                'qty' => 'required|min:1|max:255'
            ]
        );
        $cart = Cart::find($request->id);
        $cart->qty = $request->qty;
        $cart->update();
        return back();
    }
    public function delete(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->delete();
        return back();
    }

    public function useraddress(Request $request)
    {
        $validation = $request->validate(
            [
                'zipcode' => 'required|min:1|max:255',
                'address' => 'required|min:1|max:255',
                'office' => 'required|min:1|max:255'
            ]
        );
        $address = Address::where('user_id', auth()->user()->id)->first();
        $address->user_id = auth()->user()->id;
        $address->country_id = $request->country;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->zipcode = $request->zipcode;
        $address->address = $request->address;
        $address->shipping = $request->office;
        $address->update();
        return back()->with('success', 'User Address is updated!');
    }
    public function otheraddress(Request $request)
    {
        $validation = $request->validate(
            [
                'fname' => 'required|min:1|max:255',
                'lname' => 'required|min:1|max:255',
                'zipcode' => 'required|min:1|max:255',
                'address' => 'required|min:1|max:255'
            ]
        );
        $shipping = Shipping::where('user_id', auth()->user()->id)->first();

        $shipping->fname = $request->fname;
        $shipping->lname = $request->lname;
        if ($shipping->email != $request->email) {
            $shipping->email = $request->email;
        }
        if ($shipping->phone != $request->phone) {
            $shipping->phone = $request->phone;
        }
        $shipping->phone = $request->phone;
        $shipping->user_id = auth()->user()->id;
        $shipping->country_id = $request->country;
        $shipping->state_id = $request->state;
        $shipping->city_id = $request->city;
        $shipping->zipcode = $request->zipcode;
        $shipping->address = $request->address;
        $shipping->update();
        return back()->with('success', 'Other Shipping Address is updated!');
    }

    public function applycoupon(Request $request)
    {
        $coupon = Coupon::where('name', $request->name)->first();
        if ($coupon != null) {
            if (date('Y-m-d h:i:s', strtotime($coupon->expire)) < Carbon::now()->toDateTimeString()) {
                $cart = Cart::where('user_id', auth()->user()->id)->get();
                if ($cart != null) {
                    foreach ($cart as $item) {
                        $item->coupon_id = $coupon->id;
                        $item->update();
                    }
                    return back();
                } else {
                    return back();
                }
            } else {
                return back()->with('error', 'Your Coupon has Expired!');
            }
        }
    }
    public function orderplace(Request $request)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $shipping = Content::where('key', '#shipping')->first();

        //Random Invoice no Genrator
        $invoice =  mt_rand(10, 99)
            . $characters[rand(0, strlen($characters) - 1)]
            . mt_rand(100, 999);
        $discount = $request->discount;

        // insert data to slave table
        foreach ($cart as $item) {
            $slave = new Slave;
            $slave->invoice = $invoice;
            $slave->product_id = $item->product_id;
            $slave->qty = $item->qty;
            $slave->sub_total = ($item->product_name->price * $item->qty);
            $slave->discount = $discount;
            $slave->colors = $item->colors;
            $slave->sizes = $item->sizes;
            $slave->user_id = auth()->user()->id;
            $slave->save();
        }

        //Discount,sub total and total Calculate
        foreach ($cart as $item) {
            $total_qty[] = $item->qty;
            $sub_total[] = ($item->product_name->price * $item->qty);
        }
        $total = array_sum($sub_total) - (array_sum($sub_total) / 100) * ($discount);
        //Insert Order to Master Table
        $master = new Master;
        $master->invoice = $invoice;
        $master->sub_total = ceil(array_sum($sub_total));//checking ship charge
        if (array_sum($sub_total) >= (int)$shipping->heading) {
            $master->total = ceil($total);
        } else {
            $master->total = ceil($total + (int)$shipping->icon);
        }
        $master->discount = ((array_sum($sub_total) / 100) * ($discount));
        $master->qty = array_sum($total_qty);
        $master->user_id = auth()->user()->id;
        $master->address = $request->address;
        $master->method_id = $request->method;
        $master->save();
        if ($cart[0]->coupon_id != 0) {
            //Coupon hit Add
            $coupon = Coupon::where('id', $request->coupon_id)->first();
            $coupon->hit = $coupon->hit + 1;
            $coupon->update();

            //coupon use hit add
            $couponuse = CouponUse::where('user_id', auth()->user()->id)->where('coupon_id', $request->coupon_id)->first();
            if ($couponuse != null) {
                $couponuse->hit = $couponuse->hit + 1;
                $couponuse->update();
            } else {
                $couponadd = new CouponUse;
                $couponadd->user_id = auth()->user()->id;
                $couponadd->coupon_id = $request->coupon_id;
                $couponadd->hit = 1;
                $couponadd->save();
            }
        }
        //Delete data from cart
        foreach ($cart as $post) {
            $post->delete();
        }
        return redirect('user/account')->with('success', 'Your Order Placed!');
    }
}
