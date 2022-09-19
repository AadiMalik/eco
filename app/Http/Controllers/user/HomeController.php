<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\UserSystemInfoHelper;
use DB;
use Location;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('login');
        //get ip and location
        // $getip = UserSystemInfoHelper::get_ip();
        // $getbrowser = UserSystemInfoHelper::get_browsers();
        // $getdevice = UserSystemInfoHelper::get_device();
        // $getos = UserSystemInfoHelper::get_os();
        
        // $data = Location::get($getip);
        
        // if (Visitor::where('ip', $getip)->first()) {
        //     $checkip = Visitor::where('ip', $getip)->first();
        //     $data = array(
        //         'hits' => $checkip->hits + 1,
        //     );
        //     $result = DB::table('visitors')->where('ip', $getip)->update($data);
        // } else {
        //     $visitor = new Visitor;
        //     $visitor->ip = $getip;
        //     $visitor->country = $data->countryName;
        //     $visitor->region = $data->regionName;
        //     $visitor->city = $data->cityName;
        //     $visitor->zipcode = $data->zipCode;
        //     $visitor->browser = $getbrowser;
        //     $visitor->device = $getdevice;
        //     $visitor->os = $getos;
        //     $visitor->hits = '1';
        //     $visitor->save();
        // }
        // $slider = Slider::orderBy('id', 'DESC')->get();
        // $service = Service::orderBy('id', 'DESC')->get();
        // $productslider = Product::orderBy('brand_id', 'DESC')->get();
        // $productimage = ProductImage::orderBy('id', 'DESC')->get();
        // $product = Product::orderBy('id', 'DESC')->get();
        // $bestproduct = Product::orderBy('brand_id', 'ASC')->get();
        // $offerproduct = Product::orderBy('pair', 'DESC')->get();
        // $priceproduct = Product::orderBy('price', 'DESC')->get();
        // $rating = Comment::whereNull('blog_id')->get();
        // $comment = Comment::all();
        // $brand = Brand::orderBy('id', 'DESC')->get();
        // $blog = Blog::orderBy('id', 'DESC')->get();
        // $link = Link::orderBy('id', 'DESC')->get();
        // return view('user/index', compact(
        //     'slider',
        //     'service',
        //     'product',
        //     'productslider',
        //     'productimage',
        //     'rating',
        //     'bestproduct',
        //     'offerproduct',
        //     'comment',
        //     'priceproduct',
        //     'brand',
        //     'blog',
        //     'link'
        // ));
    }
}
