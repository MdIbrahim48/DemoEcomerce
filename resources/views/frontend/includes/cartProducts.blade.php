
@if ($cart_products)
{{-- {{ dd($cart_products->images) }} --}}

@foreach ($cart_products as $cart)

    {{-- <input type="hidden" id="product_id" name="product_id" value="{{ $cart['product_id'] }}"> --}}
    <tr class="pt-30">
        <td class="custome-checkbox pl-30">
            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
            <label class="form-check-label" for="exampleCheckbox1"></label>
        </td>
        <td class="image product-thumbnail pt-40">
           <img width="80px" src="{{ asset($cart['images']) }}" alt="#">
          </td>
        <td class="product-des product-name">
            <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="{{ route('frontend.single.product',$cart['slug']) }}">{{ $cart['title'] ?? '' }}</a></h6>

        </td>
        <td class="price" data-title="Price">
            <h4 class="text-body">${{$cart['discount_price'] ?? '' }}</h4>
        </td>
        <td class="text-center detail-info" data-title="Stock">
            <div class="detail-extralink mr-15">
                <div class="detail-qty border radius">
                    <a href="#"  onclick="quantityIncrement({{ $cart['product_id'] }})" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                    <span id="qtyVal{{ $cart['product_id'] }}" class="qty-val" >{{ $cart['quantity']  }}</span>
                    <a href="#" onclick="quantityDecrement({{ $cart['product_id'] }})" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                </div>
            </div>
        </td>
        <td class="price" data-title="Price">
            <h4 class="text-brand" id="subtotal{{ $cart['product_id'] }}">${{ $cart['discount_price'] * $cart['quantity']}} </h4>
        </td>
        <td class="action text-center" data-title="Remove"><a href="#" onclick="productRemove({{ $cart['product_id'] }})" class="text-body"><i class="fi-rs-trash"></i></a></td>
    </tr>
@endforeach
@endif
