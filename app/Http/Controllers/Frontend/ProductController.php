<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\DealOfTheDay;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status','1')->with('images')->paginate(10);
        $date = Carbon::now();
        $dealsOfTheDays = DealOfTheDay::with('product')->where('date','>=',$date)->where('status','1')->take('4')->get();
        return view('frontend.shop.index',[
            'products' => $products,
            'dealsOfTheDays' => $dealsOfTheDays,
        ]);
    }

    public function singleProduct($slug){
        Product::where('slug',$slug)->increment('product_counter');
        
        $product = Product::where('slug',$slug)->with('images')->first();
        $relatedProducts = Product::where('category_id',$product->category_id)->get()->except($product->id);
        return view('frontend.shop.product_detail',[
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    public function test(){
        if(request()->get('perPage') == 'all'){
            $products = Product::where('status','1')->with('images')->get();
        }
        else{
            $products = Product::where('status','1')->with('images')->paginate(request()->get('perPage'));
        }
        return response()->json([
                'view' => view('frontend.includes.all_products', compact('products'))->render()
            ], 200);

    }

    public function productFilterPrice(){
        if(request()->get('perPage') == 'lowToHigh'){
            $products = Product::where('status','1')->orderBy('discount_price','asc')->with('images')->get();
        }elseif(request()->get('perPage') == 'highTolow'){
            $products = Product::where('status','1')->orderBy('discount_price','desc')->with('images')->get();
        }
        else{
            $products = Product::where('status','1')->orderBy('created_at','desc')->with('images')->get();
        }

        return response()->json([
                'view' => view('frontend.includes.all_products', compact('products'))->render()
            ], 200);
    }


    // public function addToCart($id)
    // {

    //     $product = Product::find($id);
    //     if(!$product) {
    //         abort(404);
    //     }
    //     $cart = session()->get('cart');


    //     // if cart is empty then this the first product
    //     if(!$cart) {

    //         $cart = [
    //                 $id => [
    //                     "title" => $product->title,
    //                     "quantity" => 1,
    //                     "price" => $product->price,
    //                 ]
    //         ];

    //         session()->put('cart', $cart);
    //         return redirect()->back()->with('success', 'Product added to cart successfully!');
    //     }


    //     // if cart not empty then check if this product exist then increment quantity
    //     if(isset($cart[$id])) {

    //         $cart[$id]['quantity']++;
    //         session()->put('cart', $cart);

    //         return redirect()->back()->with('success', 'Product added to cart successfully!');

    //     }

    //     // if item not exist in cart then add to cart with quantity = 1
    //     $cart[$id] = [
    //         "title" => $product->title,
    //         "quantity" => 1,
    //         "price" => $product->price,
    //     ];

    //     session()->put('cart', $cart);

    //     return redirect()->back()->with('alert-success', 'Product added to cart successfully!');
    // }

}
