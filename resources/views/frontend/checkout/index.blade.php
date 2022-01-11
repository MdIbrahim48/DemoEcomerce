
@extends('layouts.frontend.frontend_app')

@section('frontend_title')
    Checkout
@endsection

@section('frontend_content')
 <main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form method="post" class="apply-coupon">
                            <input type="text" placeholder="Enter Coupon Code...">
                            <button class="btn  btn-md" name="login">Apply Coupon</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post" action="{{ route('frontend.customer.billingAddressUpdate') }}">
                        @csrf

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="first_name" value="{{ Auth::user()->customer->first_name ?? '' }}" required="" placeholder="First Name">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="last_name" value="{{ Auth::user()->customer->last_name ?? '' }}" required="" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="country" value="{{ $billingAddress->country ?? '' }}" required="" placeholder="Address line2">

                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="city" value="{{ $billingAddress->city ?? '' }}" placeholder="City / Town *">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="zilla" value="{{ $billingAddress->zilla ?? '' }}" required="" placeholder="Zilla">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="upazilla" value="{{ $billingAddress->upazilla ?? '' }}" placeholder="Upazilla *">
                            </div>
                        </div>

                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <input type="text" name="address" value="{{ $billingAddress->address ?? '' }}" required="" placeholder="Address *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="postcode" value="{{ $billingAddress->postcode ?? '' }}" placeholder="Postcode / ZIP *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" value="{{ Auth::user()->customer->email ?? ''}}" placeholder="Email address *">
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="cname" placeholder="Company Name">
                            </div>
                            <div class="form-group col-lg-6">
                                {{-- <input required="" type="text" name="email" value="{{ Auth::user()->customer->email ?? ''}}" placeholder="Email address *"> --}}
                            {{-- </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Additional information"></textarea>
                        </div> --}}
                        <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                    <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                </div>
                            </div>
                        </div>
                        <div id="collapsePassword" class="form-group create-account collapse in">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input required="" type="password" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAddress" class="different_address collapse in">

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="first_name" value="{{ Auth::user()->customer->first_name ?? '' }}" required="" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="last_name" value="{{ Auth::user()->customer->last_name ?? '' }}" required="" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="country" value="{{ $shippingAddress->country ?? '' }}" required="" placeholder="Address line2">

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="city" value="{{ $shippingAddress->city ?? '' }}" placeholder="City / Town *">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="zilla" value="{{ $shippingAddress->zilla ?? '' }}" required="" placeholder="Zilla">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="upazilla" value="{{ $shippingAddress->upazilla ?? '' }}" placeholder="Upazilla *">
                                    </div>
                                </div>

                                <div class="row shipping_calculator">
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="city" value="{{ $shippingAddress->city ?? '' }}" placeholder="City / Town *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="postcode" value="{{ $shippingAddress->postcode ?? '' }}" placeholder="Postcode / ZIP *">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="email" value="{{ Auth::user()->customer->email ?? ''}}" placeholder="Email address *">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            @if (session()->get('cart'))
                            <tbody>
                                @foreach (session()->get('cart') as $cartProductItem)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{ asset($cartProductItem['images']) }}" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a href="{{ route('frontend.single.product',$cartProductItem['title']) }}" class="text-heading">{{ $cartProductItem['title']}}</a></h6></span>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x {{ $cartProductItem['quantity'] }}</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">${{$cartProductItem['quantity'] * $cartProductItem['discount_price'] }}</h4>
                                    </td>
                                </tr>
                                @endforeach
                                @php
                                    $new_cart = session()->get('cart');
                                    $subTotal = 0;
                                    foreach ($new_cart as $cartSubTotal) {
                                        $subTotal = $subTotal + ($cartSubTotal['quantity'] * $cartSubTotal['discount_price']);
                                    }
                                @endphp
                                <span>Total</span>

                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="{{ asset('frontend_assets') }}/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="{{ asset('frontend_assets') }}/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="{{ asset('frontend_assets') }}/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="{{ asset('frontend_assets') }}/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <button class="your-button-class" id="sslczPayBtn"
                            token="if you have any token validation"
                            postdata="your javascript arrays or objects which requires in backend"
                            order="If you already have the transaction generated for current order"
                            endpoint="/pay-via-ajax"> Pay Now
                    </button>

                    <a href="{{ url('/pay') }}" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>


    @section('frontend_scripts')
    <script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>

    @endsection

@endsection
