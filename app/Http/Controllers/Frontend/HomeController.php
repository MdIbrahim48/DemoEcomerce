<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\DealOfTheDay;
use App\HomeSlider;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $first10Categories = Category::with('subCategory')->where('status','1')->orderBy('id','asc')->take(10)->get();
        $second10Categories = Category::with('subCategory')->where('status','1')->orderBy('id','asc')->skip(10)->take(10)->get();
        $products = Product::with('images')->where('status','1')->paginate(10);
        $dealsOfTheDays = DealOfTheDay::with('product')->where('status','1')->take('4')->get();
        $recentProducts = Product::with('images','category')->where('status','1')->orderBy('id','desc')->take('3')->get();
        $homeSliders = HomeSlider::where('status','1')->orderBy('id','desc')->get();
        $latestTwoProducts = Product::with('images')->where('status','1')->latest()->take(2)->get();
        $newAddedProducts = Product::with('images')->where('status','1')->orderBy('id','desc')->take(10)->get();
        $popularProducts = Product::with('images')->where('status','1')->orderBy('product_counter','desc')->take(10)->get();
        return view('frontend.home.index',[
            'first10Categories' => $first10Categories,
            'second10Categories' => $second10Categories,
            'recentProducts' => $recentProducts,
            'dealsOfTheDays' => $dealsOfTheDays,
            'products' => $products,
            'homeSliders' => $homeSliders,
            'latestTwoProducts' => $latestTwoProducts,
            'newAddedProducts' => $newAddedProducts,
            'popularProducts' => $popularProducts,
        ]);
    }
}
