@extends('layouts.admin.admin_app')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.order.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Order</a>
                 </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('partials.toast')
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Order</h4>
                    </div>
                    <div class="card-body m-auto">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Order Id </strong></th>
                                        <td>{{ $order->order_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Status </strong></th>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Amount </strong></th>
                                        <td>{{ $order->amount }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th scope="row"><strong> Total </strong></th>
                                        <td>{{ $order->quantity * $order->orderProduct->discount_price}}</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-12">
                <div class="card">
                    @include('partials.toast')
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Products Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>price</th>
                                <th>Stock</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderProduct as $orderProductItem)
                                    <tr>
                                        <td>{{ $orderProductItem->product->title }}</td>
                                        <td>{{ $orderProductItem->quantity }}</td>
                                        <td>{{ $orderProductItem->quantity * $orderProductItem->product->discount_price }}</td>
                                        <td>@if ($orderProductItem->product->stock >= 2) In Stock @else Out Stock @endif</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        <h4><span class="mr-3">Total Amount: </span><span>{{$order->amount}}</span></h4>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-6">
                <div class="card">
                    @include('partials.toast')
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Billing Address</h4>
                    </div>
                    <div class="card-body m-auto">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Country </strong></th>
                                        <td>{{ $order->billingAddress->country }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> City </strong></th>
                                        <td>{{ $order->billingAddress->city }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Zilla </strong></th>
                                        <td>{{$order->billingAddress->zilla }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Upazilla </strong></th>
                                        <td>{{$order->billingAddress->upazilla }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Address </strong></th>
                                        <td>{{$order->billingAddress->address }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Postcode</strong></th>
                                        <td>{{$order->billingAddress->postcode }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-6">
                <div class="card">
                    @include('partials.toast')
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Shipping Address</h4>
                    </div>
                    <div class="card-body m-auto">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Country </strong></th>
                                        <td>{{ $order->shippingAddress->country }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> City </strong></th>
                                        <td>{{ $order->shippingAddress->city }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Zilla </strong></th>
                                        <td>{{$order->shippingAddress->zilla }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Upazilla </strong></th>
                                        <td>{{$order->shippingAddress->upazilla }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Address </strong></th>
                                        <td>{{$order->shippingAddress->address }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Postcode</strong></th>
                                        <td>{{$order->shippingAddress->postcode }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->


        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
