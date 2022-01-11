<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SslCommerzPaymentController;

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
//     return view('admin.home.dashboard');
// });

Auth::routes();


//----------------frontend route start----------------
Route::group(['namespace'=> 'Frontend','as'=>'frontend.'],function () {
    Route::get('/','HomeController@index')->name('home');

    // customer controller
    Route::get('/customer/account','CustomerController@customerProfile')->name('customer.profile');
    Route::post('/customer/profile/update/{id}','CustomerController@customerProfileUpdate')->name('customer.profile.update');

    // customer billing controller
    Route::post('/customer/billing/address','BillingAddressController@billingAddressUpdate')->name('customer.billingAddressUpdate');
 // customer shipping controller
    Route::post('/customer/shipping/address','ShippingAddressController@shippingAddressUpdate')->name('customer.shippingAddressUpdate');


// Category ways product controller
    Route::get('/category/{slug}','CategoryController@categoryWaysProduct')->name('category.wise.product');
// filtering product price
    Route::get('/categorytest','CategoryController@categorytest')->name('categorytest');
    Route::get('/categoryFilterPrice','CategoryController@categoryFilterPrice')->name('categoryFilterPrice');

// SubCategory controller
Route::get('/sub/category/{slug}','SubCategoryController@index')->name('subcategory.wise.product');
Route::get('/subcategorytest','SubCategoryController@subcategorytest')->name('subcategorytest');
Route::get('/subcategoryFilterPrice','SubCategoryController@subcategoryFilterPrice')->name('subcategoryFilterPrice');


// Product controller
    Route::get('/shop','ProductController@index')->name('product');
    Route::get('/shop/{slug}','ProductController@singleProduct')->name('single.product');

// add to cart
    Route::get('/shop/addtocart/{id}','AddToCartController@addToCart')->name('product.addcart');
    Route::get('/shop/view/cart','AddToCartController@viewCart')->name('product.view.cart');
    Route::get('/cart/increment','AddToCartController@cartIncrement');
    Route::get('/cart/decrement','AddToCartController@cartDecrement');
    Route::get('/cart/remove','AddToCartController@cartRemove');
    Route::get('/cart/destroy','AddToCartController@cartDestroy');

//add to wishlist
    Route::get('/wishlist','WishlistController@index')->name('wishlist');
    Route::get('/add/wishlist/{id}','WishlistController@addwishlist')->name('addwishlist');
    Route::get('/wishlist/remove','WishlistController@wishlistRemove')->name('wishlistRemove');

 //checkout
    Route::get('/checkout','CheckoutController@index')->name('checkout')->middleware('checkoutLogin');



// filtering product price
    Route::get('/test','ProductController@test')->name('test');
    Route::get('/productFilterPrice','ProductController@productFilterPrice')->name('productFilterPrice');

// dealsOftheday
    Route::get('/deals-of-the-day/shop','DealsOfTheDayController@index')->name('deals.ofThe.day.index');
    Route::get('/all-deals-of-the-day/shop','DealsOfTheDayController@dealsOfTheDay')->name('deals.ofThe.day');

// hotdeals
    Route::get('/hot/deals','HotDealController@index')->name('hotdeals');
    Route::get('/hotdealFilteringNumber','HotDealController@hotdealFilteringNumber')->name('hotdealFilteringNumber');
    Route::get('/hotdealTextFiltering','HotDealController@hotdealTextFiltering')->name('hotdealTextFiltering');

// contact
    Route::get('/contact','ContactController@index')->name('contact');
    Route::post('/cantact/post','ContactController@submit')->name('cantact.submit');
// reting
    Route::post('/reting/submit/{id}','ReviewController@store')->name('reting.store');

    // search box
    Route::get('/search','SearchProductController@index')->name('search');
    


 });
//----------------frontend route end----------------



//----------------admin route start----------------

//---------------admin auth route start-------------
Route::group(['namespace' => 'Admin\Auth','prefix'=>'admin','as' => 'admin.'],function () {

    // login controller
    Route::get('/login','LoginController@create')->name('login');
    Route::post('/login/authenticate','LoginController@authenticate')->name('login.authenticate');

    Route::get('/logout','LoginController@logout')->name('logout');

    // forget password
    Route::get('/forget/password','ForgetPasswordController@forget_password')->name('forget.password');
    Route::post('/forget/password/post','ForgetPasswordController@submitForgetPassword')->name('forget.password.post');

    //reset password
    Route::get('reset/password/{token}','ResetPasswordController@index')->name('reset.password');
    Route::post('reset-password/post','ResetPasswordController@submitResetPasswordForm')->name('reset-password.submit-form');

    // verify user email
    Route::get('user/verify-email/{token}','VerifyController@verifyEmail')->name('user.verify_email');

});
//---------------admin auth route end-------------

Route::group(['namespace' => 'Admin','prefix'=>'admin','middleware' => ['auth','checkRole','checkStatus'],'as' => 'admin.'],function () {

    Route::get('/dashboard','HomeController@index')->name('dashboard');
    // --------------user controller start--------------
    Route::group(['prefix'=>'user','as' => 'user.'],function(){
        Route::get('/index','UserController@index')->name('index');
        Route::get('/create','UserController@create')->name('create');
        Route::post('/store','UserController@store')->name('store');
        Route::get('/edit/{id}','UserController@edit')->name('edit');
        Route::post('/update/{id}','UserController@update')->name('update');
    });
    // --------------user controller end--------------

    //-------------profile controller start-------
    Route::group(['prefix' => 'profile','as'=>'profile.'],function(){
        Route::get('/index','ProfileController@index')->name('index');
        Route::post('/update/{id}','ProfileController@profileUpdate')->name('update');
        Route::post('/update/password/{id}','ProfileController@update_password')->name('update_password');
    });
    //-------------profile controller end --------

    // --------------Category controller start--------------
    Route::group(['prefix'=>'category','as' => 'category.'],function(){
        Route::get('/index','CategoryController@index')->name('index');
        Route::get('/create','CategoryController@create')->name('create');
        Route::post('/store','CategoryController@store')->name('store');
        Route::get('/edit/{id}','CategoryController@edit')->name('edit');
        Route::post('/update/{id}','CategoryController@update')->name('update');
        Route::get('/destroy/{id}','CategoryController@destroy')->name('destroy');
    });
    // --------------Category controller end--------------

    // --------------SubCategory controller start--------------
    Route::group(['prefix'=>'subCategory','as' => 'subCategory.'],function(){
        Route::get('/index','SubCategoryController@index')->name('index');
        Route::get('/create','SubCategoryController@create')->name('create');
        Route::post('/store','SubCategoryController@store')->name('store');
        Route::get('/edit/{id}','SubCategoryController@edit')->name('edit');
        Route::post('/update/{id}','SubCategoryController@update')->name('update');
        Route::get('/destroy/{id}','SubCategoryController@destroy')->name('destroy');
    });
    // --------------SubCategory controller end--------------

    // --------------coupon controller start-------------
    Route::group(['prefix'=>'coupon','as' => 'coupon.'],function(){
        Route::get('/index','CouponController@index')->name('index');
        Route::get('/create','CouponController@create')->name('create');
        Route::post('/store','CouponController@store')->name('store');
        Route::get('/edit/{id}','CouponController@edit')->name('edit');
        Route::post('/update/{id}','CouponController@update')->name('update');
        Route::get('/destroy/{id}','CouponController@destroy')->name('destroy');
    });
    // --------------coupon controller end--------------

    // --------------product controller start-------------
    Route::group(['prefix'=>'product','as' => 'product.'],function(){
        Route::get('/index','ProductController@index')->name('index');
        Route::get('/create','ProductController@create')->name('create');

        Route::get('/get-subcat-api/{cat_id}','ProductController@getSubCategory')->name('getSubCategory');

        Route::post('/store','ProductController@store')->name('store');
        Route::get('/edit/{id}','ProductController@edit')->name('edit');
        Route::get('/remove-p-image/{id}','ProductController@removePImage')->name('remove-p-image');
        Route::post('/update/{id}','ProductController@update')->name('update');
        Route::get('/destroy/{id}','ProductController@destroy')->name('destroy');
        // productStock
        Route::get('/product/Stock','ProductController@productStock')->name('productStock');
        Route::post('/product/Stock/filtering','ProductController@stockFiltering')->name('stockFiltering');
    });
    // --------------product controller end--------------

    // --------------homeSlider controller start-------------
    Route::group(['prefix'=>'homeSlider','as' => 'homeSlider.'],function(){
        Route::get('/index','HomeSliderController@index')->name('index');
        Route::get('/create','HomeSliderController@create')->name('create');
        Route::post('/store','HomeSliderController@store')->name('store');
        Route::get('/edit/{id}','HomeSliderController@edit')->name('edit');
        Route::post('/update/{id}','HomeSliderController@update')->name('update');
        Route::get('/destroy/{id}','HomeSliderController@destroy')->name('destroy');
    });
    // --------------homeSlider controller end--------------

    // --------------Deals Of The Day controller start-------------
    Route::group(['prefix'=>'dealsOfTheDay','as' => 'dealsOfTheDay.'],function(){
        Route::get('/index','DealsOfTheDayController@index')->name('index');
        Route::get('/create','DealsOfTheDayController@create')->name('create');
        Route::post('/store','DealsOfTheDayController@store')->name('store');
        Route::get('/edit/{id}','DealsOfTheDayController@edit')->name('edit');
        Route::post('/update/{id}','DealsOfTheDayController@update')->name('update');
        Route::get('/destroy/{id}','DealsOfTheDayController@destroy')->name('destroy');
    });
    // --------------Deals Of The Day controller end--------------

    // --------------Hot Deal controller start-------------
    Route::group(['prefix'=>'hotDeal','as' => 'hotDeal.'],function(){
        Route::get('/index','HotDealController@index')->name('index');
        Route::get('/create','HotDealController@create')->name('create');
        Route::post('/store','HotDealController@store')->name('store');
        Route::post('/removeHotDeal','HotDealController@removeHotDeal')->name('removeHotDeal');
     });
    // --------------Hot Deal controller end--------------


    // --------------Contact controller start-------------
    Route::group(['prefix'=>'contact','as' => 'contact.'],function(){
        Route::get('/index','ContactController@index')->name('index');
        Route::get('/view/{id}','ContactController@view')->name('view');
        Route::get('/destroy/{id}','ContactController@destroy')->name('destroy');
        Route::get('/deleteAll','ContactController@deleteAll')->name('deleteAll');
        Route::get('/reply/{id}','ContactController@reply')->name('reply');
        Route::post('/reply/submit','ContactController@replySubmit')->name('reply.submit');
     });
    // --------------Contact controller end--------------

    // --------------order controller start-------------
    Route::group(['prefix'=>'order','as' => 'order.'],function(){
        Route::get('/index','OrderController@index')->name('index');
        Route::get('/edit/{id}','OrderController@edit')->name('edit');
        Route::post('/update/{id}','OrderController@update')->name('update');
        Route::get('/view/{id}','OrderController@view')->name('view');
        Route::get('/destroy/{id}','OrderController@destroy')->name('destroy');
     });
    // --------------order controller end--------------

    // --------------socialIcon controller start-------------
    Route::group(['prefix'=>'socialIcon','as' => 'socialIcon.'],function(){
        Route::get('/index','SocialIconController@index')->name('index');
        Route::get('/create','SocialIconController@create')->name('create');
        Route::post('/store','SocialIconController@store')->name('store');
        Route::get('/edit/{id}','SocialIconController@edit')->name('edit');
        Route::post('/update/{id}','SocialIconController@update')->name('update');
        Route::get('/destroy/{id}','SocialIconController@destroy')->name('destroy');
     });
    // --------------socialIcon controller end--------------

    // --------------setting controller start-------------
    Route::group(['prefix'=>'setting','as' => 'setting.'],function(){
        Route::get('/index','SettingController@index')->name('index');
        Route::post('/update/{id}','SettingController@update')->name('update');
     });
    // --------------setting controller end--------------

    // --------------review controller start-------------
    Route::group(['prefix'=>'review','as' => 'review.'],function(){
        Route::get('/index','ReviewController@index')->name('index');
        Route::get('/view/{id}','ReviewController@view')->name('view');
        Route::get('/destroy/{id}','ReviewController@destroy')->name('destroy');
        Route::get('/reply/{id}','ReviewController@reply')->name('reply');
        Route::post('/reply/submit','ReviewController@replySubmit')->name('reply.submit');

        Route::get('/status/{id}','ReviewController@status')->name('status');

     });
    // --------------review controller end--------------


});

//----------------admin route end----------------

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


