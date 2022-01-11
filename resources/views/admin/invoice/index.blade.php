@extends('layouts.admin.admin_app')
@section('admin_content')

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

                            {{-- <tr style="text-transform:capitalize;">
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">02</td>
                                <td
                                    style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;text-align:left;">
                                    Laptop Hp Elitebook G3</td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">1</td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">20 $
                                </td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">20 $
                                </td>
                            </tr>
                            <tr style="text-transform:capitalize;">
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">03</td>
                                <td
                                    style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;text-align:left;">
                                    Keyboard A4tech #4512324</td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">3</td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">20 $
                                </td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">60 $
                                </td>
                            </tr>
                            <tr style="text-transform:capitalize;">
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">04</td>
                                <td
                                    style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;text-align:left;">
                                    Mouse A4tech #4512324</td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">3</td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">20 $
                                </td>
                                <td style="padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;">60 $
                                </td>
                            </tr> --}}
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
                                {{-- <tr>
                                    <th style="padding:3px 10px;">Tax (+)</th>
                                    <td style="text-align:center;padding-right:20px;">5 %</td>
                                </tr>
                                <tr>
                                    <th style="padding:3px 10px;">Shipping (+)</th>
                                    <td style="text-align:center;padding-right:20px;">10 $</td>
                                </tr>
                                <tr>
                                    <th style="padding:3px 10px;">Discount (-)</th>
                                    <td style="text-align:center;padding-right:20px;">0 $</td>
                                </tr>
                                <tr style="border-top: 1px solid #999;color:#da291c;font-weight:bold;">
                                    <th style="padding:3px 10px;">Grand Total</th>
                                    <td style="text-align:center;padding-right:20px;">262 $</td>
                                </tr>
                                <tr>
                                    <th style="padding:3px 10px;">Amount Paid</th>
                                    <td style="text-align:center;padding-right:20px;">250 $</td>
                                </tr>
                                <tr>
                                    <th style="padding:3px 10px;">Total Due</th>
                                    <td style="text-align:center;padding-right:20px;">12 $</td>
                                </tr> --}}
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


@section('admin_scripts')
@if (Session::has('alert-danger'))
<script>
    toastr.warning("{!! Session::get('alert-danger') !!}");
</script>
@endif
@endsection

@endsection
