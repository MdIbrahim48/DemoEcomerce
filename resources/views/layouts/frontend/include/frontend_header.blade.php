<header class="header-area header-style-1 header-style-5 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            {{-- <li><a href="page-about.html">About Us</a></li> --}}
                            {{-- <li><a href="page-account.html">My Account</a></li> --}}
                            <li><a href="shop-wishlist.html">Wishlist</a></li>
                            <li><a href="shop-order.html">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Need help? Call Us: <strong class="text-brand"> <a href="tel:+01600000000">01600000000</a></strong></li>
                            {{-- <li>
                                <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend_assets') }}/imgs/theme/flag-fr.png" alt="" />Français</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend_assets') }}/imgs/theme/flag-dt.png" alt="" />Deutsch</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend_assets') }}/imgs/theme/flag-ru.png" alt="" />Pусский</a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li>
                                <a class="language-dropdown-active" href="#">USD <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend_assets') }}/imgs/theme/flag-fr.png" alt="" />INR</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend_assets') }}/imgs/theme/flag-dt.png" alt="" />MBP</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend_assets') }}/imgs/theme/flag-ru.png" alt="" />EU</a>
                                    </li>
                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('photo/setting') }}/{{ $setting->logo }}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            {{-- <select id="search-category" class="select-active">
                                <option>All Categories</option>
                                @foreach ($categories as $catItem)
                                    <option value="{{ $catItem->name }}">{{ $catItem->name }}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" id="search-product"  onkeyup="productSearch()" placeholder="Search for items..." />
                           @include('frontend.includes.search_products')
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="shop-compare.html">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-compare.svg" />
                                    <span class="pro-count blue">3</span>
                                </a>
                                <a href="shop-compare.html"><span class="lable ml-0">Compare</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="{{ route('frontend.wishlist') }}">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-heart.svg" />
                                    @if (session()->get('wishlist'))
                                    <span class="pro-count blue">{{ count(wishlistProduct()) }}</span>
                                    @else
                                    <span class="pro-count blue">0</span>
                                    @endif
                                </a>
                                <a href="{{ route('frontend.wishlist') }}"><span class="lable">Wishlist</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('frontend.product.view.cart') }}">
                                    <img alt="Nest" src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-cart.svg" />
                                    @if (session()->get('cart'))
                                    <span class="pro-count blue">{{ count(cartProduct()) }}</span>
                                    @else
                                    <span class="pro-count blue">0</span>
                                    @endif
                                </a>
                                <a href="{{ route('frontend.product.view.cart') }}"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @if (session()->get('cart'))
                                            @foreach (cartProduct() as $cartItem)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{ asset($cartItem['images']) }}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="{{ route('frontend.single.product',$cartItem['slug']) }}">{{ $cartItem['title'] }}</a></h4>
                                                    <h4><span>1 × </span>${{ $cartItem['discount_price'] }}</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            @endforeach
                                        @endif

                                        {{-- <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend_assets') }}/imgs/shop/thumbnail-3.jpg" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend_assets') }}/imgs/shop/thumbnail-2.jpg" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Corduroy Shirts</a></h4>
                                                <h4><span>1 × </span>$3200.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li> --}}
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            {{-- <h4>Total <span>$4000.00</span></h4> --}}
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('frontend.product.view.cart') }}" class="outline">View cart</a>
                                            <a href="{{ route('frontend.checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-user.svg" />
                                </a>
                                <a href="#"><span class="lable ml-0">Account</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">

                                   @if (Auth::check())
                                    @if (Auth::User()->role == 'Customer')
                                        <ul>
                                            <li>
                                                <a href="{{ route('frontend.customer.profile') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                            </li>
                                            <li>
                                                <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="document.getElementById('logout-form').submit();"> <i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    @endif
                                    @else
                                    <ul>
                                        <li>
                                            <a href=" {{ url('/login') }}"><i class="fi fi-rs-user mr-10"></i>Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/register') }}"><i class="fi fi-rs-location-alt mr-10"></i>Register</a>
                                        </li>
                                    </ul>

                                   @endif





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('frontend_assets') }}/imgs/theme/logo.png" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Trending</span> Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach ($first5Categories as $catItem)
                                    <li>
                                        <a href="{{ route('frontend.category.wise.product',$catItem->slug) }}"> <img src="{{ asset('photo/category') }}/{{ $catItem->image }}" alt="" />{{ $catItem->name }}</a>
                                    </li>
                                    @endforeach
                                    {{-- <li>
                                        <a href="shop-grid-right.html"> <img src="{{ asset('frontend_assets') }}/imgs/theme/icons/category-1.svg" alt="" />Milks and Dairies</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="{{ asset('frontend_assets') }}/imgs/theme/icons/category-2.svg" alt="" />Clothing & beauty</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="{{ asset('frontend_assets') }}/imgs/theme/icons/category-3.svg" alt="" />Pet Foods & Toy</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="{{ asset('frontend_assets') }}/imgs/theme/icons/category-4.svg" alt="" />Baking material</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="{{ asset('frontend_assets') }}/imgs/theme/icons/category-5.svg" alt="" />Fresh Fruit</a>
                                    </li> --}}
                                </ul>
                                <ul class="end">
                                    @foreach ($second5Categories as $catItem)
                                    <li>
                                        <a href="{{ route('frontend.category.wise.product',$catItem->slug) }}"> <img src="{{ asset('photo/category') }}/{{ $catItem->image }}" alt="" />{{ $catItem->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach ($third5Categories as $catItem)
                                            <li>
                                                <a href="{{ route('frontend.category.wise.product',$catItem->slug) }}"> <img src="{{ asset('photo/category') }}/{{ $catItem->image }}" alt="" />{{ $catItem->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                        @foreach ($fourth5Categories as $catItem)
                                            <li>
                                                <a href="{{ route('frontend.category.wise.product',$catItem->slug) }}"> <img src="{{ asset('photo/category') }}/{{ $catItem->image }}" alt="" />{{ $catItem->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-hot-white.svg" alt="hot deals" /><a href="{{ route('frontend.hotdeals') }}">Hot Deals</a></li>
                                <li>
                                    <a class="active" href="{{ route('frontend.home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="page-about-2.html">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.product') }}">Shop</a>
                                </li>
                                {{-- <li class="position-static">
                                    <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        @foreach ($megaMenuCategories as $categoryItem)
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">{{ $categoryItem->name }}</a>
                                                <ul>
                                                    @foreach ($categoryItem->subCategory as $subCategoriItem)
                                                        <li><a href="shop-product-right.html">{{ $subCategoriItem->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach

                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Fruit & Vegetables</a>
                                            <ul>
                                                <li><a href="shop-product-right.html">Meat & Poultry</a></li>
                                                <li><a href="shop-product-right.html">Fresh Vegetables</a></li>
                                                <li><a href="shop-product-right.html">Herbs & Seasonings</a></li>
                                                <li><a href="shop-product-right.html">Cuts & Sprouts</a></li>
                                                <li><a href="shop-product-right.html">Exotic Fruits & Veggies</a></li>
                                                <li><a href="shop-product-right.html">Packaged Produce</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Breakfast & Dairy</a>
                                            <ul>
                                                <li><a href="shop-product-right.html">Milk & Flavoured Milk</a></li>
                                                <li><a href="shop-product-right.html">Butter and Margarine</a></li>
                                                <li><a href="shop-product-right.html">Eggs Substitutes</a></li>
                                                <li><a href="shop-product-right.html">Marmalades</a></li>
                                                <li><a href="shop-product-right.html">Sour Cream</a></li>
                                                <li><a href="shop-product-right.html">Cheese</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Meat & Seafood</a>
                                            <ul>
                                                <li><a href="shop-product-right.html">Breakfast Sausage</a></li>
                                                <li><a href="shop-product-right.html">Dinner Sausage</a></li>
                                                <li><a href="shop-product-right.html">Chicken</a></li>
                                                <li><a href="shop-product-right.html">Sliced Deli Meat</a></li>
                                                <li><a href="shop-product-right.html">Wild Caught Fillets</a></li>
                                                <li><a href="shop-product-right.html">Crab and Shellfish</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="shop-product-right.html"><img src="{{ asset('frontend_assets') }}/imgs/banner/banner-menu.png" alt="Nest" /></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>
                                                        Don't miss<br />
                                                        Trending
                                                    </h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="shop-product-right.html">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>25%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="blog-category-grid.html">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-headphone-white.svg" alt="hotline" />
                    <p><a href="tel:+01917364532" style="color: white;">{{ $setting->phone }}</a><span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-heart.svg" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest" src="{{ asset('frontend_assets') }}/imgs/theme/icons/icon-cart.svg" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend_assets') }}/imgs/shop/thumbnail-3.jpg" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend_assets') }}/imgs/shop/thumbnail-4.jpg" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('frontend.product.view.cart') }}">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>

    function productSearch() {
        var x = document.getElementById("search-product");


        // x.value = x.value.toUpperCase();
        // console.log(x.value);

        $.ajax({
                type:'GET',
                url:'{!!URL::to('search')!!}',
                data:{'searchProduct':x.value},
                success:function(response){
                    $('#search-item').html(response.view);
                },

            });
    }
</script>
