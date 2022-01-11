<?php

namespace App\Providers;

use App\Category;
use App\Contact;
use App\DealOfTheDay;
use App\Product;
use App\Orders;
use App\Review;
use App\Setting;
use App\SocialIcon;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $megaMenuCategories = Category::with('product')->where('status','1')->take(4)->get();
        $first5Categories = Category::with('product')->where('status','1')->orderBy('id','asc')->take(5)->get();
        $second5Categories = Category::with('product')->where('status','1')->orderby('id','asc')->skip(5)->take(5)->get();
        $third5Categories = Category::with('product')->where('status','1')->orderBy('id','asc')->skip(10)->take(5)->get();
        $fourth5Categories = Category::with('product')->where('status','1')->orderby('id','asc')->skip(15)->take(5)->get();
        $products = Product::with('images')->where('status','1')->orderBy('id','desc')->take(4)->get();
        $date = Carbon::now();
        $dealsOfTheDays = DealOfTheDay::with('product')->where('date','>=',$date)->where('status','1')->take('4')->get();
        $totalUnreadOrders = Orders::where('read_status','unread')->count();
        $totalUnreadContacts = Contact::where('read_status','unread')->count();

        $setting = Setting::orderBy('id','desc')->where('status','1')->first();
        $socialicons = SocialIcon::where('status','1')->get();
        $totalUnreadReview = Review::where('read_reting','unread')->count();

        // $cartProducts = session()->get('cart');
        // View::share(['cartProducts' => $cartProducts]);
        View::share(['megaMenuCategories' => $megaMenuCategories]);
        View::share([
            'categories' => $first5Categories,
            'first5Categories' => $first5Categories,
            'second5Categories' => $second5Categories,
            'third5Categories' => $third5Categories,
            'fourth5Categories' => $fourth5Categories,

        ]);
        View::share(['dealsOfTheDays' => $dealsOfTheDays]);
        view()->share(['products' => $products]);
        view()->share(['totalUnreadOrders' => $totalUnreadOrders]);
        view()->share(['totalUnreadContacts' => $totalUnreadContacts]);
        view()->share(['setting' => $setting]);
        view()->share(['socialicons' => $socialicons]);
        view()->share(['totalUnreadReview' => $totalUnreadReview]);


        $product_search_result = [];
        view()->share(['product_search_result' => $product_search_result]);
    }
}
