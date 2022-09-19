<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user/index');
// });

Route::view('slip', 'admin/master/detail');
// user Routes
Route::get('/', [App\Http\Controllers\user\HomeController::class,'index']);
Route::get('about', [App\Http\Controllers\user\AboutController::class,'index']);
Route::post('contact', [App\Http\Controllers\user\ContactController::class,'store']);
Route::get('blog', [App\Http\Controllers\user\BlogController::class,'index']);
Route::get('blogdetail/{id}', [App\Http\Controllers\user\BlogDetailController::class,'index']);
Route::post('blogdetail/{id}', [App\Http\Controllers\user\BlogDetailController::class,'store']);
Route::get('detail/{id}', [App\Http\Controllers\user\DetailController::class,'index']);
Route::post('detail/{id}', [App\Http\Controllers\user\DetailController::class,'store']);
Route::post('search', [App\Http\Controllers\user\SearchController::class,'index']);
Route::get('category/{id}', [App\Http\Controllers\user\SearchController::class,'category']);
Route::get('brand/{id}', [App\Http\Controllers\user\SearchController::class,'brand']);
Route::get('color/{id}', [App\Http\Controllers\user\SearchController::class,'color']);
Route::get('size/{id}', [App\Http\Controllers\user\SearchController::class,'size']);
Route::get('shop', [App\Http\Controllers\user\ShopController::class,'index']);
Route::get('faq', [App\Http\Controllers\user\FaqController::class,'index']);
Route::get('term', [App\Http\Controllers\user\TermController::class,'index']);
Route::get('payment', [App\Http\Controllers\user\PaymentController::class,'index']);

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'is_user','is_block']], function () {
    Route::get('account', [App\Http\Controllers\user\AccountController::class,'index']);
    Route::post('profile', [App\Http\Controllers\user\AccountController::class,'profile']);
    Route::post('picture', [App\Http\Controllers\user\AccountController::class,'picture']);
    Route::post('password', [App\Http\Controllers\user\AccountController::class,'password']);
    Route::post('shipping', [App\Http\Controllers\user\AccountController::class,'shipping']);
    Route::post('cancelorder/{id}', [App\Http\Controllers\user\AccountController::class,'cancelorder']);
    Route::post('addtransaction', [App\Http\Controllers\user\AccountController::class,'addtransaction']);
    Route::post('transationdelete/{id}', [App\Http\Controllers\user\AccountController::class,'transationdelete']);
    Route::post('detail/{id}', [App\Http\Controllers\user\DetailController::class,'cart']);
    Route::post('detailwish/{id}', [App\Http\Controllers\user\DetailController::class,'wish']);
    Route::get('cart', [App\Http\Controllers\user\CartController::class,'index']);
    Route::post('applycoupon', [App\Http\Controllers\user\CartController::class,'applycoupon']);
    Route::post('addcart', [App\Http\Controllers\user\CartController::class,'add']);
    Route::post('cartupdate', [App\Http\Controllers\user\CartController::class,'update']);
    Route::post('cartremove', [App\Http\Controllers\user\CartController::class,'delete']);
    Route::post('useraddress', [App\Http\Controllers\user\CartController::class,'useraddress']);
    Route::post('otheraddress', [App\Http\Controllers\user\CartController::class,'otheraddress']);
    Route::post('orderplace', [App\Http\Controllers\user\CartController::class,'orderplace']);
    Route::post('wish', [App\Http\Controllers\user\WishController::class,'add']);
    Route::get('wishlist', [App\Http\Controllers\user\WishController::class,'index']);
    Route::post('remove', [App\Http\Controllers\user\WishController::class,'remove']);
    Route::get('getcart',[App\Http\Controllers\user\NavbarController::class,'getcart']);

    
});

Route::view('reply', 'emails/reply');
Route::view('complete', 'user/complete');

Route::view('contact', 'user/contact');


Route::view('user', 'admin/user/index');
Route::view('createuser', 'admin/user/create');
// Route::view('aboutslider', 'admin/aboutslider/index');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin','is_block']], function () {
/////////////////start resource  route ///////////////////
Route::resources([
    'dashboard'          => App\Http\Controllers\DashboardController::class,
    'blog'          => App\Http\Controllers\BlogController::class,
    'brand'          => App\Http\Controllers\BrandController::class,
    'city'          => App\Http\Controllers\CityController::class,
    'state'          => App\Http\Controllers\StateController::class,
    'country'          => App\Http\Controllers\CountryController::class,
    'color'          => App\Http\Controllers\ColorController::class,
    'size'          => App\Http\Controllers\SizeController::class,
    'link'          => App\Http\Controllers\LinkController::class,
    'menu'          => App\Http\Controllers\MenuController::class,
    'macromenu'          => App\Http\Controllers\MacroMenuController::class,
    'micromenu'          => App\Http\Controllers\MicroMenuController::class,
    'product'          => App\Http\Controllers\ProductController::class,
    'productcolor'          => App\Http\Controllers\ProductColorController::class,
    'productsize'          => App\Http\Controllers\ProductSizeController::class,
    'productimage'          => App\Http\Controllers\ProductImageController::class,
    'aboutslider'          => App\Http\Controllers\AboutSliderController::class,
    'service'          => App\Http\Controllers\ServiceController::class,
    'contact'           => App\Http\Controllers\ContactController::class,
    'content'          => App\Http\Controllers\ContentController::class,
    'comment'          => App\Http\Controllers\CommentController::class,
    'slider'          => App\Http\Controllers\SliderController::class,
    'team'          => App\Http\Controllers\TeamController::class,
    'visitor'          => App\Http\Controllers\VisitorController::class,
    'user'           => App\Http\Controllers\UserController::class,
    'address'           => App\Http\Controllers\AddressController::class,
    'shipping'           => App\Http\Controllers\ShippingController::class,
    'transactiontype'           => App\Http\Controllers\TransactionTypeController::class,
    'transaction'           => App\Http\Controllers\TransactionController::class,
    'faq'           => App\Http\Controllers\FaqController::class,
    'term'           => App\Http\Controllers\TermController::class,
    'master'           => App\Http\Controllers\MasterController::class,
    'slave'           => App\Http\Controllers\SlaveController::class,
    'coupon'           => App\Http\Controllers\CouponController::class,
    'couponuse'           => App\Http\Controllers\CouponUseController::class,
    'payment'           => App\Http\Controllers\PaymentController::class,
    'courier'           => App\Http\Controllers\CourierController::class,
    'company'           => App\Http\Controllers\CompanyController::class,

    /////////////////end resource  route ///////////////////
]);
//Profile Route
Route::get('profile', [App\Http\Controllers\ProfileController::class,'index']);
Route::post('info', [App\Http\Controllers\ProfileController::class,'info']);
Route::post('picture', [App\Http\Controllers\ProfileController::class,'picture']);
Route::post('password', [App\Http\Controllers\ProfileController::class,'password']);

 });

Route::get('country-state-city','DropdownController@index');
Route::post('get-states-by-country','DropdownController@getState');
Route::post('get-cities-by-state','DropdownController@getCity');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
