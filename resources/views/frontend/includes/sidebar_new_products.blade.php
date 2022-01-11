
                    <h5 class="section-title style-1 mb-30">New products</h5>
                    @foreach ($products as $nProduct)
                    <div class="single-post clearfix">
                        <div class="image">
                            @foreach ($nProduct->images as $imgItem)
                            @if ($loop->index == 0)
                                <img src="{{ asset($imgItem->image) }}" alt="#" />
                            @endif
                            @endforeach
                            {{-- <img src="{{ asset('frontend_assets') }}/imgs/shop/thumbnail-3.jpg" alt="#" /> --}}
                        </div>
                        <div class="content pt-10">
                            <h5><a href="{{ route('frontend.single.product',$nProduct->slug) }}">{{ $nProduct->title }}</a></h5>
                            <p class="price mb-0 mt-5">{{ $nProduct->price }}</p>
                            <div class="product-rate">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
