<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductGallery;
use App\SubCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('images')->get();
        return view('admin.product.index',[
            'products' => $products
        ]);
    }

    public function create(){
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $coupons = Coupon::get();
        return view('admin.product.create',[
            'categories' => $categories,
            'subcategories' => $subcategories,
            'coupons' => $coupons,
        ]);
    }

    public function getSubCategory($cat_id){
        $sub_cat = SubCategory::where('category_id',$cat_id)->get();
        return response()->json($sub_cat);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'sku' => 'required',
            'quantity' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $products = new Product;
        $products->title = $request->title;
        $products->slug = Str::slug($request->title);
        $products->price = $request->price;
        $products->percent = $request->percent;
        $products->discount_price =(int)($request->price - ($request->price * ($request->percent) / 100 ));
        $products->summary = $request->summary;
        $products->description = $request->description;
        $products->sku = $request->sku;
        $products->quantity = $request->quantity;
        $products->stock = $request->stock;
        $products->start_stock = $request->stock;
        $products->category_id = $request->category_id;
        $products->subcategory_id = $request->subcategory_id;
        $products->status = $request->status;
        $products->created_by = Auth::user()->email;
        $products->save();

        if($files=$request->file('image')){
            foreach($files as $file){
                $coverPhoto = $file;
                $getExt = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_'.time().'_'.uniqid().'.'.$getExt;
                $destination ='photo/products/';
                $data['image'] = $destination.$modifiedName;
                $coverPhoto->move( $destination ,$modifiedName );
                ProductGallery::create([
                    'image' => $data['image'],
                    'product_id' => $products->id,
                ]);
            }
        }

        return back()->with('alert-success','Product Added Successfully');

    }

    public function edit($id){
        $product = Product::where('id',$id)->with('images')->first();
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $coupons = Coupon::get();
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'coupons' => $coupons,
        ]);
    }

    public function removePImage($id){
        $image = ProductGallery::where('id',$id)->first();
        if($image){
            if($image->image != ''  && $image->image != null){
                $old_file = $image->image;
                if(file_exists($old_file)){
                    File::delete($old_file);
                }
            }
            $image->delete();
            return back()->with('alert-success','Image Removed');
        }else{
            return back()->with('alert-warning','Image Not Found');
        }
    }

    public function update(Request $request , $id){
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'sku' => 'required',
            'quantity' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);
        $product = Product::where('id',$id)->first();
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->price = $request->price;
        $product->percent = $request->percent;
        $product->discount_price = $request->price - ($request->price * ($request->percent) / 100 );
        $product->summary = $request->summary;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->quantity = $request->quantity;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->status = $request->status;
        $product->created_by = Auth::user()->email;
        $product->update();

        if($files=$request->file('image')){
            foreach($files as $file){
                $coverPhoto = $file;
                $getExt = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_'.time().'_'.uniqid().'.'.$getExt;
                $destination ='photo/products/';
                $data['image'] = $destination.$modifiedName;
                $coverPhoto->move( $destination ,$modifiedName );
                ProductGallery::create([
                    'image' => $data['image'],
                    'product_id' => $product->id,
                ]);
            }
        }
        return back()->with('alert-success','Product Update Successfully');
    }

    public function destroy($id){
        $images = ProductGallery::where('product_id',$id)->get();
        if(count($images)>0){
            foreach($images as $image){
                if($image->image != ''  && $image->image != null){
                    $old_file = $image->image;
                    if(file_exists($old_file)){
                        File::delete($old_file);
                    }
                }
            }
        }
        ProductGallery::where('product_id',$id)->delete();
        Product::where('id',$id)->delete();
        return back()->with('alert-danger','Product Delete Successfully');
    }

    public function productStock(){
        $products = Product::where('status','1')->get();
        return view('admin.product.productStock',[
            'products' => $products
        ]);
    }

    public function stockFiltering(Request $request){
        $request->validate([
            'from' => 'required|numeric|min:1',
            'to' => 'required|numeric|max:2000',
        ]);
        $from = $request->from;
        $to = $request->to;
        $products =Product::where('stock','>=',$from)->Where('stock','<=',$to)->get();
        return view('admin.product.productStock',[
            'products' => $products
        ]);

    }


}
