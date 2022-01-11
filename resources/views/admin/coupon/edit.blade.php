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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.coupon.index') }}">All Coupon</a></li>
                            <li class="breadcrumb-item active">Coupon</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.coupon.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Coupon</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Edit Coupon</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.coupon.update',$coupon->id) }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Coupon Name <span class="text-danger">*</span> </label>
                                                    <input type="text" name="name" class="form-control" value="{{$coupon->name ?? old('name')}}" placeholder="Enter Name"/>
                                                    @error('name')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product Name<span class="text-danger">*</span></label>
                                                    <select name="product_id" id="" class="form-control">
                                                        <option value>---Select Product---</option>
                                                        @foreach ($products as $product)
                                                            <option @if ($coupon->product_id == $product->id) selected @endif value="{{ $product->id }}">{{ $product->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('product_id')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                 </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Coupon Description <span class="text-danger">*</span> </label>
                                                    <textarea name="description" class="form-control" >{{$coupon->description ?? old('description')}}</textarea>
                                                    @error('description')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Discount Type <span class="text-danger">*</span> </label>
                                                    <select name="discount_type" id="" class="form-control">
                                                        <option value>----Select Discount Type----</option>
                                                        <option @if ($coupon->discount_type == 'parcent') selected @endif value="parcent">Parcent</option>
                                                        <option @if ($coupon->discount_type == 'flat') selected @endif value="flat">Flat</option>
                                                    </select>
                                                    @error('discount_type')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Coupon Amount <span class="text-danger">*</span> </label>
                                                    <input type="text" name="coupon_amount" class="form-control" value="{{$coupon->coupon_amount ?? old('coupon_amount')}}"/>
                                                    @error('coupon_amount')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Expire Date<span class="text-danger">*</span> </label>
                                                    <input type="date" name="expire_date" class="form-control" value="{{$coupon->expire_date ?? old('expire_date')}}"/>
                                                    @error('expire_date')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Min Spend <span class="text-danger">*</span> </label>
                                                    <input type="text" name="min_spend" class="form-control" value="{{$coupon->min_spend ?? old('min_spend')}}"/>
                                                    @error('min_spend')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Indivitual Use <span class="text-danger">*</span> </label>
                                                    <select name="indivitual_use" id="" class="form-control">
                                                        <option value></option>
                                                        <option @if ( $coupon->indivitual_use == 'yes') selected @endif value="yes">Yes</option>
                                                        <option @if ( $coupon->indivitual_use == 'no') selected @endif value="no">No</option>
                                                    </select>
                                                    @error('indivitual_use')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Usage Limit Per Coupon <span class="text-danger">*</span> </label>
                                                    <input type="text" name="usage_limit_per_coupon" class="form-control" value="{{$coupon->usage_limit_per_coupon ?? old('usage_limit_per_coupon')}}"/>
                                                    @error('usage_limit_per_coupon')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value>---Select Status---</option>
                                                        <option @if ($coupon->status == '1') selected @endif value="1">Active</option>
                                                        <option @if ($coupon->status == '2') selected @endif value="2">InActive</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                 </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

    @section('admin_scripts')
        @if (Session::has('alert-success'))
        <script>
            toastr.success("{!! Session::get('alert-success') !!}");
        </script>
        @endif
    @endsection

@endsection
