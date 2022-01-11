
 @foreach ($wishlist_products as $wishlist_product)
 <tr class="pt-30">
     <td class="custome-checkbox pl-30">
         <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
         <label class="form-check-label" for="exampleCheckbox1"></label>
     </td>
     <td class="image product-thumbnail pt-40"><img src="{{ $wishlist_product['image'] }}" alt="#" /></td>
     <td class="product-des product-name">
         <h6><a class="product-name mb-10" href="{{ route('frontend.single.product',$wishlist_product['title']) }}">{{ $wishlist_product['title'] }}</a></h6>
         <div class="product-rate-cover">
             <div class="product-rate d-inline-block">
                 <div class="product-rating" style="width: 90%"></div>
             </div>
             <span class="font-small ml-5 text-muted"> (4.0)</span>
         </div>
     </td>
     <td class="price" data-title="Price">
         <h3 class="text-brand">${{ $wishlist_product['discount_price'] }}</h3>
     </td>
     <td class="text-center detail-info" data-title="Stock">
         <span class="stock-status in-stock mb-0"> @if ($wishlist_product['stock'] >= 2) In Stock @else Out Stock @endif</span>
     </td>
     <td class="text-right" data-title="Cart">
         {{-- <button class="btn btn-sm" >Add to cart</button> --}}
         <a href="{{ route('frontend.product.addcart',$wishlist_product['product_id']) }}" class="btn btn-sm">Add to cart</a>
     </td>
     <td class="action text-center" data-title="Remove">
         <a href="#" onclick="wishlistRemove({{$wishlist_product['product_id']}})" class="text-body"><i class="fi-rs-trash"></i></a>
     </td>
 </tr>
@endforeach
