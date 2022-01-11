@extends('layouts.frontend.frontend_app')
@section('frontend_title')
    Profile
@endsection

@section('frontend_content')

  <main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Hello Rosie!</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                                manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->status }}</td>
                                                            <td>${{ $order->amount }}</td>
                                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$order->id}}">
                                                                View
                                                              </button>

                                                            <!-- Button trigger modal -->
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-fullscreen">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3>Order Id:</h3>
                                                                    <h5 class="modal-title " id="exampleModalLabel"> {{ $order->order_id }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="col-lg-8 m-auto">
                                                                            <div class="card justify-content-center m-auto">
                                                                                <div class="card-header">
                                                                                    <h5 class="mb-0">Order Id: {{ $order->order_id }}</h5>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <section id="invoice-print" class="smt-50" style="margin-top:50px;">
                                                                                        <div>
                                                                                            <div
                                                                                                style="width:796px; height:1120px; margin: 0 auto;text-transform:capitalize;color:#222; padding:20px;background: #fff;overflow: hidden;">
                                                                                                <div style="width:756px; height:1080px;font-size:13px;">
                                                                                                    <div style="height:110px;">
                                                                                                        <div style="width:606px;float:left;padding-top: 36px;">
                                                                                                            <div
                                                                                                                style="border-bottom:2px solid #f0674c;width:50px;float:left;padding-top:39px;margin-right:5px;">
                                                                                                            </div>
                                                                                                            <h1 style="text-transform:uppercase;letter-spacing: 12px;font-weight:600;">Invoice</h1>
                                                                                                            <p style="margin-bottom:0;letter-spacing:2px">No. <span
                                                                                                                    style="font-weight: 700;font-size:15px;">{{ $order->order_id }}</span>
                                                                                                                    {{-- <span>17, January, 2021</span> --}}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div style="width:150px;float:left;">
                                                                                                            <div
                                                                                                                style="border: 1px solid #f0674c;text-align:center;margin-top:-20px;height:130px;line-height:120px;">
                                                                                                                <img src="./img/logo/company.png" alt="company logo"
                                                                                                                    style="height:100px; width:100px;margin: 15px 25px;">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div style="height:120px;margin-top:80px;">
                                                                                                        <div style="width:368px;float:left;overflow:hidden;margin-right:10px;">
                                                                                                            <h3 style="font-size: 18px;font-weight: 600;margin-bottom:5px;">Billing Address:</h3>
                                                                                                            <p style="margin-bottom:0;">{{ $order->billingAddress->country }}</p>
                                                                                                            <p style="margin-bottom:0;">{{ $order->billingAddress->city }}</p>
                                                                                                            <p style="margin-bottom:0;">{{$order->billingAddress->zilla }}</p>
                                                                                                            <p style="margin-bottom:0;">{{$order->billingAddress->upazilla }}</p>
                                                                                                            <p style="margin-bottom:0;">{{$order->billingAddress->address }}</p>
                                                                                                            <p style="margin-bottom:0;">{{$order->billingAddress->postcode }}</p>
                                                                                                        </div>
                                                                                                        <div style="width:368px;float:left;overflow:hidden;margin-left:10px;">
                                                                                                            <h3 style="font-size: 18px;font-weight: 600;margin-bottom:5px;">Shipping Address:</h3>
                                                                                                            <p style="margin-bottom:0;">{{ $order->shippingAddress->country }}</p>
                                                                                                            <p style="margin-bottom:0;">{{ $order->shippingAddress->city }}</p>
                                                                                                            <p style="margin-bottom:0;">{{ $order->shippingAddress->zilla }}</p>
                                                                                                            <p style="margin-bottom:0;">{{ $order->shippingAddress->upazilla }}</p>
                                                                                                            <p style="margin-bottom:0;">{{ $order->shippingAddress->address }}</p>
                                                                                                            <p style="margin-bottom:0;">{{ $order->shippingAddress->postcode }}</p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    {{-- <div style="height:25px;">
                                                                                                        <div style="width:368px;float:left;">
                                                                                                            <p style="font-size:17px;float:left;margin-right:5px;margin-bottom:5px">Grand Total:
                                                                                                                <b>$262</b>/-</p>
                                                                                                        </div>
                                                                                                        <div style="width:368px;float:left;">
                                                                                                            <p style="font-size:17px;float:right;margin-right:5px;margin-bottom:5px;">Total Due:
                                                                                                                <b>$12</b>/-</p>
                                                                                                        </div>
                                                                                                    </div> --}}
                                                                                                    <div style="position: relative;">
                                                                                                        <table
                                                                                                            style="border-top: 2px solid #999;text-align:center;border-bottom: 2px solid #999;border-collapse: collapse;width: 100%;margin-bottom: 1rem;">
                                                                                                            <thead>
                                                                                                                <tr style="text-transform:uppercase;font-weight: bold;border-bottom: 2px solid #999;">
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">SN</td>
                                                                                                                    <td
                                                                                                                        style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;text-align:left;">
                                                                                                                        Product Information</td>
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">Quantity
                                                                                                                    </td>
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">Rate
                                                                                                                    </td>
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">Total
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                @foreach ($order->orderProduct as $orderProductItem)
                                                                                                                <tr style="text-transform:capitalize;">
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">01</td>
                                                                                                                    <td
                                                                                                                        style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;text-align:left;">
                                                                                                                        {{ $orderProductItem->product->title }}</td>
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">{{ $orderProductItem->quantity }}</td>
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">{{ $orderProductItem->product->discount_price }} $
                                                                                                                    </td>
                                                                                                                    <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">{{ $orderProductItem->quantity * $orderProductItem->product->discount_price }} $
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                 @endforeach

                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <img src="./img/payment/paid.png" alt="paid.png"
                                                                                                            style="position: absolute;top: 50%;opacity:0.5;left: 50%;height: 100px;width: 100px;">
                                                                                                    </div>
                                                                                                    <div style="height:180px;">
                                                                                                        <div style="width: 545px;float:left;padding-top:55px;">
                                                                                                            <p style="margin-bottom:0;font-size:14px;"><b>Payment Method:</b> Cash</p>
                                                                                                            <p style="margin-bottom:30px;font-size:14px;"><b>Due Date:</b> 20, January, 2021</p>
                                                                                                        </div>
                                                                                                        <div style="width:200px;float:left;">
                                                                                                            <table style="border-collapse: collapse;width: 100%;margin-bottom: 1rem;">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th style="padding:3px 10px;">Subtotal</th>
                                                                                                                        <td style="text-align:center;padding-right:20px;">{{$order->amount}} $</td>
                                                                                                                    </tr>
                                                                                                                   
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <div style="width:500px;float:left;padding-top:51px;">
                                                                                                            <p style="margin-bottom:0;font-size:12px;padding-right:0px;"><b>Notes: </b>Thanks For Shopping.
                                                                                                                No refund if product is damaged.</p>
                                                                                                            <p style="margin-bottom:0;font-size:12px;padding-right:0px;"><b>Terms & Conditions: </b>It also
                                                                                                                specifies the jurisdictions and governing laws and authorities in case of any disputes in
                                                                                                                payments.</p>
                                                                                                        </div>
                                                                                                        <div style="text-align:center;width:230px;float:right;padding-top:65px;">
                                                                                                            <p style="text-transform:capitalize;margin-bottom:0;border-top:1px solid #999;padding:5px 0px;">
                                                                                                                <b>Md.Rahad Amin</b></p>
                                                                                                            <p style="margin-bottom:0;margin-top:0;">Founder & CEO</p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </section>

                                                                                <h4 class="total"><span class="mr-3">Total Amount: </span><span>{{ $order->amount }}</span></h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                                                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                        {{-- <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2020</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Orders tracking</h3>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Billing Address</h3>
                                                </div>
                                                <div class="card-body">
                                                    @if ($billingAddress)
                                                        <span>{{ $billingAddress->country }}</span><br>
                                                        <span>{{ $billingAddress->city }}</span><br>
                                                        <span>{{ $billingAddress->zilla }}</span><br>
                                                        <span>{{ $billingAddress->upazilla }}</span><br>
                                                        <span>{{ $billingAddress->postcode }}</span><br>
                                                        <address>
                                                            {{ $billingAddress->address }}
                                                        </address>
                                                        <br>
                                                        <button type="button" class="btn btn-primary modal-class" data-toggle="modal" data-target="#bAddressModalLong">
                                                            Update Belling Address
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-primary modal-class" data-toggle="modal" data-target="#bAddressModalLong">
                                                            Add Belling Address
                                                        </button>
                                                    @endif

                                                    <!-- Button trigger modal -->
                                                    {{-- <button type="button" class="btn btn-primary modal-class" data-toggle="modal" data-target="#bAddressModalLong">
                                                        Add Belling Address
                                                    </button> --}}
                                                    <!-- Modal -->
                                                    <div class="my-modal modal fade" id="bAddressModalLong">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title">Modal title</h5>
                                                            <button type="button" class="close modal-class" data-target="#bAddressModalLong" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <form  method="post" action="{{ route('frontend.customer.billingAddressUpdate') }}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Country <span class="required">*</span></label>
                                                                            <input type="text" class="form-control" name="country" value="{{ $billingAddress->country ?? old('country') }}"/>
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label>City <span class="required">*</span></label>
                                                                            <input type="text" class="form-control" name="city" value="{{ $billingAddress->city ?? old('city') }}"/>
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label>Zilla <span class="required">*</span></label>
                                                                            <input type="text" class="form-control" name="zilla" value="{{ $billingAddress->zilla ?? old('zilla') }}"/>
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label>Upazilla <span class="required">*</span></label>
                                                                            <input class="form-control" name="upazilla" type="text" value="{{ $billingAddress->upazilla ?? old('upazilla') }}"/>
                                                                            @error('upazilla')
                                                                                <span class="text text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label>Postcode <span class="required">*</span></label>
                                                                            <input class="form-control" name="postcode" type="text" value="{{ $billingAddress->postcode ?? old('postcode') }}"/>
                                                                            @error('postcode')
                                                                                <span class="text text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label>Address <span class="required">*</span></label>
                                                                            <input class="form-control" name="address" type="text" value="{{ $billingAddress->address ?? old('address') }}"/>
                                                                            @error('address')
                                                                                <span class="text text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary modal-class" data-target="#bAddressModalLong" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary h-100">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--End header-->

                                                 </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    @if ($shippingAddress)
                                                        <span>{{ $shippingAddress->country ?? '' }}</span><br>
                                                        <span>{{ $shippingAddress->city ?? '' }}</span><br>
                                                        <span>{{ $shippingAddress->zilla ?? '' }}</span><br>
                                                        <span>{{ $shippingAddress->upazilla ?? '' }}</span><br>
                                                        <span>{{ $shippingAddress->postcode ?? ''}}</span><br>
                                                        <address>
                                                            {{ $shippingAddress->address ?? '' }}
                                                        </address>
                                                        <br>
                                                        <button type="button" class="btn btn-primary modal-class" data-toggle="modal" data-target="#sAddressModalLong">
                                                            Update Shipping Address
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-primary modal-class" data-toggle="modal" data-target="#sAddressModalLong">
                                                            Add Shipping Address
                                                        </button>
                                                    @endif

                                                <!-- Button trigger modal -->

                                                <!-- Modal -->
                                                <div class="my-modal modal fade" id="sAddressModalLong">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="close modal-class" data-target="#sAddressModalLong" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <form  method="post" action="{{ route('frontend.customer.shippingAddressUpdate') }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Country <span class="required">*</span></label>
                                                                        <input type="text" class="form-control" name="country" value="{{ $shippingAddress->country ?? old('country') }}"/>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label>City <span class="required">*</span></label>
                                                                        <input type="text" class="form-control" name="city" value="{{ $shippingAddress->city ?? old('city') }}"/>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label>Zilla <span class="required">*</span></label>
                                                                        <input type="text" class="form-control" name="zilla" value="{{ $shippingAddress->zilla ?? old('zilla') }}"/>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label>Upazilla <span class="required">*</span></label>
                                                                        <input class="form-control" name="upazilla" type="text" value="{{ $shippingAddress->upazilla ?? old('upazilla') }}"/>
                                                                        @error('upazilla')
                                                                            <span class="text text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label>Postcode <span class="required">*</span></label>
                                                                        <input class="form-control" name="postcode" type="text" value="{{ $shippingAddress->postcode ?? old('postcode') }}"/>
                                                                        @error('postcode')
                                                                            <span class="text text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label>Address <span class="required">*</span></label>
                                                                        <input class="form-control" name="address" type="text" value="{{ $shippingAddress->address ?? old('address') }}"/>
                                                                        @error('address')
                                                                            <span class="text text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary modal-class" data-target="#sAddressModalLong" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary h-100">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                <!--End header-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Already have an account? <a href="{{ url('/login') }}">Log in instead!</a></p>
                                            <form method="post" action="{{ route('frontend.customer.profile.update',Auth::user()->id) }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" value="{{ $customer->first_name ?? old('first_name') }}" name="first_name" type="text" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name <span class="required">*</span></label>
                                                        <input required="" type="text" class="form-control" name="last_name" value="{{ $customer->last_name ?? old('last_name') }}"/>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>User Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="user_name" type="text" value="{{ $customer->user_name ?? old('user_name') }}"/>
                                                        @error('user_name')
                                                            <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="email" type="email" value="{{ $customer->email ?? old('email') }}"/>
                                                        @error('email')
                                                            <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Phone <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="phone" type="number" value="{{ $customer->phone ?? old('phone') }}"/>
                                                        @error('phone')
                                                            <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Photo <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="image" type="file"/>
                                                        @error('image')
                                                            <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input class="form-control" name="previous_password" type="password" />
                                                        @error('previous_password')
                                                            <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input class="form-control" name="password" type="password" />
                                                        @error('password')
                                                            <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input class="form-control" name="password_confirmation" type="password" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
@section('frontend_scripts')
@if (Session::has('alert-success'))
<script>
    toastr.success("{!! Session::get('alert-success') !!}");
</script>

@endif

@endsection

@endsection
