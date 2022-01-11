<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductGallery;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        $images = ProductGallery::where('product_id',$product->id)->first();
        //dd($images);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "product_id" => $product->id,
                        "slug" => $product->slug,
                        "images" => $images->image,
                        "title" => $product->title,
                        "quantity" => 1,
                        "discount_price" => $product->discount_price,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $product->id,
            "slug" => $product->slug,
            "images" => $images->image,
            "title" => $product->title,
            "quantity" => 1,
            "discount_price" => $product->discount_price,
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('alert-success', 'Product added to cart successfully!');
    }


    public function viewCart(){
        $cart_products = session()->get('cart');
        return view('frontend.cart.index',[
            'cart_products' => $cart_products
        ]);
    }

    public function cartIncrement(){
        $cart = session()->get('cart');
        $id = request()->get('productId');
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            $new_cart = session()->get('cart');
            $subTotal = 0;
            foreach ($new_cart as $cartSubTotal) {
                $subTotal = $subTotal + ($cartSubTotal['quantity'] * $cartSubTotal['discount_price']);
            }
            return response()->json([
                'subtotal_price' => $cart[$id]['quantity'] * $cart[$id]['discount_price'],
                'quantity' => $cart[$id]['quantity'],
                'subTotal' => $subTotal,
                // 'cart_products' =>view('frontend.includes.all_products', compact('subTotal'))->render()
            ],200);

        }

    }

    public function cartDecrement(){
        $cart = session()->get('cart');
        $id = request()->get('productId');
        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] > 1){
                $cart[$id]['quantity']--;
                session()->put('cart', $cart);
            }
            $new_cart = session()->get('cart');
            $subTotal = 0;
            foreach ($new_cart as $cartSubTotal) {
                $subTotal = $subTotal + ($cartSubTotal['quantity'] * $cartSubTotal['discount_price']);
            }
            return response()->json([
                'subtotal_price' => $cart[$id]['quantity'] * $cart[$id]['discount_price'],
                'quantity' => $cart[$id]['quantity'],
                'subTotal' => $subTotal
            ],200);
        }

    }

    public function cartRemove(){
        $cart = session()->get('cart');
        $id = request()->get('productId');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $cart_products = session()->get('cart');
            $subTotal = 0;
            foreach ($cart_products as $cartSubTotal) {
                $subTotal = $subTotal + ($cartSubTotal['quantity'] * $cartSubTotal['discount_price']);
            }
            return response()->json([
                'sub_total' => $subTotal,
                'view' => view('frontend.includes.cartProducts', compact('cart_products'))->render()
            ],200);
        }

    }

    public function cartDestroy(){
        Session::forget('cart');
        $cart_products = session()->get('cart');
        return response()->json([
            'sub_total' => 0,
            'view' => view('frontend.includes.cartProducts', compact('cart_products'))->render()
        ],200);
    }

}
