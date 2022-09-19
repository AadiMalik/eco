<?php

namespace App\Http\Controllers;

use App\Models\AboutSlider;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\City;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Link;
use App\Models\MacroMenu;
use App\Models\Master;
use App\Models\Menu;
use App\Models\MicroMenu;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Service;
use App\Models\Size;
use App\Models\Slave;
use App\Models\Slider;
use App\Models\State;
use App\Models\Team;
use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role',2)->count('id');
        $countaboutslider = AboutSlider::count('id');
        $countblog = Blog::count('id');
        $countbrand = Brand::count('id');
        $countcity = City::count('id');
        $countcomment = Comment::count('id');
        $countcontact = Contact::count('id');
        $countcountry = Country::count('id');
        $countlink = Link::count('id');
        $countproduct = Product::count('id');
        $countproductimage = ProductImage::count('id');
        $countservice = Service::count('id');
        $countslider=Slider::count('id');
        $countstate=State::count('id');
        $countteam=Team::count('id');
        $order=Master::count('id');
        $orderproduct=Slave::count('id');
        $transaction=Transaction::count('id');
        $transactiontype=TransactionType::count('id');
        $countvisitors = Visitor::count('id');
        $counthits = Visitor::sum('hits');
        $countcoupon = Coupon::count('id');
        $countcouponuse = Coupon::sum('hit');
        return view('admin/dashboard', compact(
            'users',
            'countaboutslider',
            'countblog',
            'countbrand',
            'countcity',
            'countcomment',
            'countcontact',
            'countcountry',
            'countlink',
            'countproduct',
            'countproductimage',
            'countservice',
            'countslider',
            'countstate',
            'countteam',
            'order',
            'orderproduct',
            'transaction',
            'transactiontype',
            'countvisitors',
            'counthits',
            'countcoupon',
            'countcouponuse'
        ));
    }
}
