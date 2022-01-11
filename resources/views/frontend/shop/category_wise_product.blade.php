
@extends('layouts.frontend.frontend_app')
@section('frontend_title')
    Category Wise Product
@endsection

@section('frontend_content')
 <main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">{{ $category->name }}</h1>
                        <div class="breadcrumb">
                            <a href="{{ route('frontend.home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> {{ $category->name }}
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
                        <p>We found <strong class="text-brand">{{ $category->product->count() }}</strong> items for you!</p>
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
                                    <li onclick="productFilter(50, '{{request()->slug}}')">50</a></li>
                                    <li onclick="productFilter(100,'{{request()->slug}}')">100</a></li>
                                    <li onclick="productFilter(150,'{{request()->slug}}')">150</a></li>
                                    <li onclick="productFilter('all','{{request()->slug}}')">All</a></li>

                                    {{-- <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li> --}}
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
                                    <li onclick="productFilterPrice('lowToHigh','{{request()->slug}}')">Price: Low to High</a></li>
                                    <li onclick="productFilterPrice('highTolow','{{request()->slug}}')">Price: High to Low</a></li>
                                    <li onclick="productFilterPrice('rDate','{{request()->slug}}')">Release Date</a></li>

                                    {{-- <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- category wise product --}}
                <div class="row product-grid" id="categoryWiseProducts">
                   @include('frontend.includes.all_products')
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <section class="section-padding pb-5">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="{{ route('frontend.deals.ofThe.day') }}">
                            All Deals
                            <i class="fi-rs-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        {{-- deals of the product --}}
                        @include('frontend.includes.deals_of_the_day')

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
            function productFilter(x,y){
                $('.sort-by-product-wrap .number').text(x);
                $.ajax({
                    type:'GET',
                    url:'{!!URL::to('categorytest')!!}',
                    data:{'perPage':x,'slug':y},
                    success:function(response){
                        $('#categoryWiseProducts').html(response.view);
                        $('.sort-by-cover').removeClass('show');
                        $('.sort-by-dropdown').removeClass('show');
                    },

                });
            }
        </script>
        <script>
            function productFilterPrice(x,y){
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
                    url:'{!!URL::to('categoryFilterPrice')!!}',
                    data:{'perPage':x,'slug':y},
                    success:function(response){
                        $('#categoryWiseProducts').html(response.view);
                        $('.sort-by-cover').removeClass('show');
                        $('.sort-by-dropdown').removeClass('show');
                    },

                });
            }
        </script>
    @endsection

@endsection
