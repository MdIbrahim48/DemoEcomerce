<?php

namespace App\Http\Controllers\Frontend;

use App\DealOfTheDay;
use App\HotDeal;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HotDealController extends Controller
{
    public function index(){
        $date = Carbon::now();
        $dealsOfTheDays = DealOfTheDay::with('product')->where('date','>=',$date)->where('status','1')->take('4')->get(); 
        $products = Product::where('hot_deal','yes')->where('status','1')->get();
            return view('frontend.hot_deals.index',[
                'dealsOfTheDays' => $dealsOfTheDays,
                'products' => $products,
            ]);
    }

    public function hotdealFilteringNumber(){
        if (request()->get('perPage') == 'all') {
            $products = Product::with('image')->where('hot_deal','yes')->where('status','1')->get();
        }else {
            $products = Product::where('hot_deal','yes')->where('status','1')->paginate(request()->get('perPage'));
        }
        return response()->json([
            'view' => view('frontend.includes.all_products', compact('products'))->render()
        ], 200);
    }

    public function hotdealTextFiltering(){
        if(request()->get('perPage' == 'lowToHigh')){
            $products = Product::with('images')->where('hot_deal','yes')->where('status','1')->orderBy('discount_price','asc')->get();
        }elseif(request()->get('perPage') == 'highTolow'){
            $products = Product::with('images')->where('hot_deal','yes')->where('status','1')->orderBy('discount_price','desc')->get();
        }else {
            $products = Product::where('status','1')->where('hot_deal','yes')->orderBy('created_at','desc')->with('images')->get();
        }
        return response()->json([
            'view' => view('frontend.includes.all_products', compact('products'))->render()
        ], 200);
    }
      
}
