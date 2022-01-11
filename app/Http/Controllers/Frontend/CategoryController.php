<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductGallery;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryWaysProduct($slug){
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->where('status','1')->paginate(25);
        return view('frontend.shop.category_wise_product',[
            'products' => $products,
            'category' => $category
        ]);
    }

    public function categorytest(){
        $category = Category::where('slug',request()->get('slug'))->first();

        // $products = Product::where('category_id',$category->id)->where('status','1')->paginate(request()->get('perPage'));
        if(request()->get('perPage') == 'all'){
            $products = Product::where('category_id',$category->id)->where('status','1')->get();
        }
        else{
            $products = Product::where('category_id',$category->id)->where('status','1')->paginate(request()->get('perPage'));
        }
        return response()->json([
                'view' => view('frontend.includes.all_products', compact('products'))->render()
        ], 200);
    }

    public function categoryFilterPrice(){
        $category = Category::where('slug',request()->get('slug'))->first();
        if(request()->get('perPage') == 'lowToHigh'){
            $products = Product::where('category_id',$category->id)->where('status','1')->orderBy('discount_price','asc')->get();
        }elseif(request()->get('perPage') == 'highTolow'){
            $products = Product::where('category_id',$category->id)->where('status','1')->orderBy('discount_price','desc')->get();
        }
        else{
            $products = Product::where('category_id',$category->id)->where('status','1')->orderBy('created_at','desc')->get();
        }

        return response()->json([
                'view' => view('frontend.includes.all_products', compact('products'))->render()
            ], 200);

    }



}
