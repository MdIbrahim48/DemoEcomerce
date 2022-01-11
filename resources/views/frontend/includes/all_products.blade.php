
@foreach ($products as $product)
<div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="{{ route('frontend.single.product',$product->slug) }}">
                    @foreach ($product->images as $imgItem)
                        @if ($loop->index == 0)
                        <img class="default-img" src="{{ asset($imgItem->image) }}" alt="" />
                        @endif
                        @if ($loop->index == 1)
                        <img class="hover-img" src="{{ asset($imgItem->image) }}" alt="" />
                        @endif
                    @endforeach
                </a>
            </div>
            <div class="product-action-1">
                <a aria-label="Add To Wishlist" class="action-btn" href="{{ route('frontend.addwishlist',$product->id) }}"><i class="fi-rs-heart"></i></a>
                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}"><i class="fi-rs-eye"></i></a>
            </div>

            <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @foreach ($product->images as $imgItem)
                                            <figure class="border-radius-10">
                                                <img src="{{ asset($imgItem->image) }}" alt="product image" />
                                            </figure>
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            @foreach ($product->images as $imgItem)
                                                <div><img src="{{ asset($imgItem->image) }}" alt="{{ $imgItem }}" /></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <span class="stock-status out-stock"> @if ($product->stock >= 2) In Stock @else Out Stock @endif </span>
                                        <h3 class="title-detail"><a href="{{ route('frontend.single.product',$product->slug) }}" class="text-heading">{{ $product->title }}</a></h3>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <span class="current-price text-brand">${{ $product->discount_price }}</span>
                                                <span>
                                                    <span class="save-price font-md color3 ml-15">{{ $product->percent }}% Off</span>
                                                    <span class="old-price font-md ml-15">${{ $product->price}}</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="detail-extralink mb-30">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                        <div class="font-xs">
                                            <ul>
                                                <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                                <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="product-badges product-badges-position product-badges-mrg">
                <span class="hot">@if ($product->stock >=2) InStock @else OutStock @endif </span>
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <a href="{{ route('frontend.category.wise.product',$product->category->slug) }}">{{ $product->category->name }}</a>
            </div>
            <h2><a href="{{ route('frontend.single.product',$product->slug) }}">{{ $product->title }}</a></h2>
            <div class="product-rate-cover">
                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
                <span class="font-small ml-5 text-muted"> (4.0)</span>
            </div>
            <div class="product-card-bottom">
                <div class="product-price">
                    <span>${{$product->price - ($product->price * ($product->percent / 100) ) }}</span>
                    <span class="old-price">${{ $product->price }}</span>
                </div>
                <div class="add-cart">
                    <a class="add" href="{{ route('frontend.product.addcart',$product->id) }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
