
@extends('layouts.frontend.frontend_app')

@section('frontend_title')
    Hot Deal
@endsection

@section('frontend_content')
  <main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Hot Deal</h1>
                        <div class="breadcrumb">
                            <a href="{{ route('frontend.home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Hot Deal
                        </div>
                    </div>
                    <div class="col-xl-9 text-end d-none d-xl-block">
                        {{-- <ul class="tags-list">
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                            </li>
                            <li class="hover-up active">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Artichoke</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Celery</a>
                            </li>
                            <li class="hover-up mr-0">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Spinach</a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ sizeof($products) }}</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> <span class="number">50</span> <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                
                                <ul>
                                    <li onclick="productFilter(50)">50</a></li>
                                    <li onclick="productFilter(100)">100</a></li>
                                    <li onclick="productFilter(150)">150</a></li>
                                    <li onclick="productFilter('all')">All</a></li>


                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> <span class="text">Featured</span> <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li onclick="productFilterPrice('lowToHigh')">Price: Low to High</a></li>
                                    <li onclick="productFilterPrice('highTolow')">Price: High to Low</a></li>
                                    <li onclick="productFilterPrice('rDate')">Release Date</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid" id="test">

                    @include('frontend.includes.all_products')

                    {{-- {!! $products->links() !!} --}}

                </div>
                <!--product grid-->
                <section class="section-padding pb-5">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="{{ route('frontend.deals.ofThe.day') }}">
                            All Deals
                            <i class="fi-rs-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
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
                    </div>
                </section>
                <!--End Deals-->
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    @include('frontend.includes.right_sidebar_category')
                </div>
                <!-- Fillter By Price -->
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Fill by price</h5>
                    @include('frontend.includes.fill_by_price')
                </div>
                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                    @include('frontend.includes.sidebar_new_products')
                </div>
                <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                    <img src="{{ asset('frontend_assets') }}/imgs/banner/banner-11.png" alt="" />
                    <div class="banner-text">
                        <span>Oganic</span>
                        <h4>
                            Save 17% <br />
                            on <span class="text-brand">Oganic</span><br />
                            Juice
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    @section('frontend_scripts')
        <script>
            function productFilter(x){
                $('.sort-by-product-wrap .number').text(x);
                $.ajax({
                    type:'GET',
                    url:'{!!URL::to('hotdealFilteringNumber')!!}',
                    data:{'perPage':x},
                    success:function(response){
                        $('#test').html(response.view);
                    },

                });
            }
        </script>
        <script>
            function productFilterPrice(x){
                var filterText ;
                if(x == 'lowToHigh'){
                    filterText = 'Low To High';
                }else if(x == 'highTolow'){
                    filterText = 'High To Low';
                }else{
                    filterText = 'Release Date';
                }
                $('.sort-by-product-wrap .text').text(filterText);
                $.ajax({
                    type:'GET',
                    url:'{!!URL::to('hotdealTextFiltering')!!}',
                    data:{'perPage':x},
                    success:function(response){
                        $('#test').html(response.view);
                    },

                });
            }
        </script>
    @endsection
@endsection
