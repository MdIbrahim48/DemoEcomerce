<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($slug){
        $subcategories = SubCategory::where('slug',$slug)->where('status','1')->first();
        $products = Product::where('subcategory_id',$subcategories->id)->where('status','1')->paginate(25);
        return view('frontend.sub_category.index',[
            'subcategories' => $subcategories,
            'products' => $products
        ]);
    }

    public function subcategorytest(){
        $subcategories = SubCategory::where('slug',request()->get('slug'))->first();

        // $products = Product::where('subcategory_id',$subcategories->id)->where('status','1')->paginate(request()->get('perPage'));
        if(request()->get('perPage') == 'all'){
            $products = Product::where('subcategory_id',$subcategories->id)->where('status','1')->get();
        }
        else{
            $products = Product::where('subcategory_id',$subcategories->id)->where('status','1')->paginate(request()->get('perPage'));
        }
        return response()->json([
                'view' => view('frontend.includes.all_products', compact('products'))->render()
        ], 200);
    }

    public function subcategoryFilterPrice(){
        $subcategories = SubCategory::where('slug',request()->get('slug'))->first();
        if(request()->get('perPage') == 'lowToHigh'){
            $products = Product::where('subcategory_id',$subcategories->id)->where('status','1')->orderBy('discount_price','asc')->get();
        }elseif(request()->get('perPage') == 'highTolow'){
            $products = Product::where('subcategory_id',$subcategories->id)->where('status','1')->orderBy('discount_price','desc')->get();
        }
        else{
            $products = Product::where('subcategory_id',$subcategories->id)->where('status','1')->orderBy('created_at','desc')->get();
        }

        return response()->json([
                'view' => view('frontend.includes.all_products', compact('products'))->render()
            ], 200);

    }


}
