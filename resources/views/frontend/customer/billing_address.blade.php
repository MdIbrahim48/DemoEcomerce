@extends('layouts.frontend.frontend_app')
@section('frontend_title')
    Billing Address
@endsection

@section('frontend_content')

  <!--End header-->
  <main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span><a href="{{ route('frontend.customer.profile') }}" rel="nofollow">Account</a> <span></span> Billing Address
            </div>
        </div>
    </div>
    <br><br>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="text-center">Billing Address</h2><br>
                             <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('frontend.customer.billingAddressUpdate') }}">
                                            @csrf
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

                                                <div class="form-group col-md-12">
                                                    <label>Upazilla <span class="required">*</span></label>
                                                    <input class="form-control" name="upazilla" type="text" value="{{ $billingAddress->upazilla ?? old('upazilla') }}"/>
                                                    @error('upazilla')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Postcode <span class="required">*</span></label>
                                                    <input class="form-control" name="postcode" type="text" value="{{ $billingAddress->postcode ?? old('postcode') }}"/>
                                                    @error('postcode')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input class="form-control" name="address" type="text" value="{{ $billingAddress->address ?? old('address') }}"/>
                                                    @error('address')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold">Update</button>
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
</main>
@section('frontend_scripts')
@if (Session::has('alert-success'))
<script>
    toastr.success("{!! Session::get('alert-success') !!}");
</script>
@endif

@endsection

@endsection
