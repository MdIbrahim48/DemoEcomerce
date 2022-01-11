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
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>
                    {{-- <a href="{{ route('admin.category.create') }}" class="mb-sm-0 font-size-18 btn btn-primary"><i class="fas fa-plus"></i> Add Category</a> --}}
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header content-background">
                        <h4 class="card-title text-center" style="color: #ffffff">Edit Setting</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    @include('partials.toast')
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.setting.update',$setting->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{$setting->email ?? old('email') }}" placeholder="Enter email"/>
                                                    @error('email')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input type="number" name="phone" class="form-control" value="{{$setting->phone ?? old('phone') }}" placeholder="Enter phone"/>
                                                    @error('phone')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Mobile</label>
                                                    <input type="number" name="mobile" class="form-control" value="{{$setting->mobile ?? old('mobile') }}" placeholder="Enter mobile"/>
                                                    @error('mobile')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea name="address" rows="5" cols="10" class="form-control" >{{$setting->address ?? old('address')}}</textarea>
                                                    @error('address')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Logo</label>
                                                    <input type="file" name="logo" class="form-control"/>
                                                    <img style="width:30px;height:30px;" src="{{asset('photo/setting')}}/{{$setting->logo}}" alt="{{$setting->logo}}">
                                                    @error('logo')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value>---Select Status---</option>
                                                        <option @if($setting->status == '1') selected @endif value="1">Active</option>
                                                        <option @if($setting->status == '2') selected @endif value="2">InActive</option>
                                                    </select>
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
        @if (Session::has('alert-danger'))
        <script>
            toastr.warning("{!! Session::get('alert-danger') !!}");
        </script>
        @endif
    @endsection

@endsection
