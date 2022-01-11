 
                    @foreach ($category->product as $pItem)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('frontend.single.product',$pItem->slug) }}">
                                        @foreach ($pItem->images as $PitemImg)
                                        @if ($loop->index == 0)
                                        <img class="default-img" src="{{ asset($PitemImg->image) }}" alt="" />
                                        @endif
                                        @if ($loop->index == 1)
                                        <img class="hover-img" src="{{ asset($PitemImg->image) }}" alt="" />
                                        @endif
                                        @endforeach
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">
                                        @if ($pItem->stock >= 2) InStock @else OutStock @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('frontend.category.wise.product',$category->slug) }}">{{ $category->name }}</a>
                                </div>
                                <h2><a href="{{ route('frontend.single.product',$pItem->slug) }}">{{ $pItem->title }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                {{-- <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                </div> --}}
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span> ${{ $pItem->price - ($pItem->price *($pItem->percent/100)) }}
                                        </span>
                                        <span class="old-price">${{ $pItem->price }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach