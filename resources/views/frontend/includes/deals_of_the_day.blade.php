

@foreach ($dealsOfTheDays as $dealsOfTheDay)
<div class="col-xl-3 col-lg-4 col-md-6">
    <div class="product-cart-wrap style-2">
        <div class="product-img-action-wrap">
            <div class="product-img">
                <a href="{{ route('frontend.single.product',$dealsOfTheDay->product->slug) }}">
                    @foreach ($dealsOfTheDay->product->images as $dPitem)
                        @if ($loop->index == 0)
                            <img src="{{asset($dPitem->image) }}" alt="" />
                        @endif
                    @endforeach
                </a>
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="deals-countdown-wrap">
                    <div class="deals-countdown" data-countdown="{{date('Y/m/d H:i:s', strtotime($dealsOfTheDay->date)) }}"></div>
            </div>
            <div class="deals-content">
                <h2><a href="{{ route('frontend.single.product',$dealsOfTheDay->product->slug) }}">{{ $dealsOfTheDay->product->title }}</a></h2>
                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                </div>
                <div class="product-card-bottom">
                    <div class="product-price">
                        <span>${{ $dealsOfTheDay->product->discount_price}}</span>
                        <span class="old-price">${{ $dealsOfTheDay->product->price}}</span>
                    </div>
                    <div class="add-cart">
                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
