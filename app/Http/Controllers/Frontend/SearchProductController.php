<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function index(){
        $searchProduct = request()->get('searchProduct');
        $product_search_result = [];
        if($searchProduct != ''){
            $product_search_result = Product::where('title','LIKE',"%$searchProduct%")->get(); 
            return response()->json([
                'view' => view('frontend.includes.search_products', compact('product_search_result'))->render()
            ], 200);  
        }
        else{
            return response()->json([
                'view' => view('frontend.includes.search_products', compact('product_search_result'))->render()
            ], 200);
        }
        
      

    // Search in the title and body columns from the posts table
    }
   
}
