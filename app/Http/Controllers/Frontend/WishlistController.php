<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{

    public function index(){
        $wishlist_products = session()->get('wishlist');
        return view('frontend.wishlist.index',[
            'wishlist_products' => $wishlist_products
        ]);
    }


    public function addwishlist($id)
    {
        $product = Product::find($id);
        $images = ProductGallery::where('product_id',$product->id)->first();

        if(!$product) {
            abort(404);
        }
        $wishlist = session()->get('wishlist');

        // if cart is empty then this the first product
        if(!$wishlist) {
            $wishlist = [
                    $id => [
                        "product_id" => $product->id,
                        "slug" => $product->slug,
                        "image" => $images->image,
                        "title" => $product->title,
                        "stock" => $product->stock,
                        "quantity" => 1,
                        "discount_price" => $product->discount_price,
                    ]
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'WishList added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        //     session()->put('cart', $cart);
        //     return redirect()->back()->with('success', 'Product added to cart successfully!');

        // }
        // if item not exist in cart then add to cart with quantity = 1
        $wishlist[$id] = [
            "product_id" => $product->id,
            "slug" => $product->slug,
            "image" => $images->image,
            "title" => $product->title,
            "stock" => $product->stock,
            "quantity" => 1,
            "discount_price" => $product->discount_price,
        ];
        session()->put('wishlist', $wishlist);
        return redirect()->back()->with('alert-success', 'WishList added to cart successfully!');
    }

    public function wishlistRemove(){
        $wishlist = session()->get('wishlist');
        $id = request()->get('productId');
        if(isset($wishlist[$id])) {
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);
            $wishlist_products = session()->get('wishlist');
            return response()->json([
                'view' => view('frontend.includes.wishlist_products', compact('wishlist_products'))->render()
            ],200);
        }
    }
}
