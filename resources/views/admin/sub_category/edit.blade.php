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
                            <li class="breadcrumb-item"><a href="{{ route('admin.subCategory.index') }}">All SubCategory</a></li>
                            <li class="breadcrumb-item active">SubCategory</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.subCategory.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All SubCategory</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Add SubCategory</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.subCategory.update',$subCategory->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label">SubCategory Name <span class="text-danger">*</span> </label>
                                                    <input type="text" name="name" class="form-control" value="{{$subCategory->name ?? old('name')}}" placeholder="Enter Name" required/>
                                                    @error('name')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Image <span class="text-danger">*</span> </label>
                                                    <input type="file" name="image" class="form-control"/>
                                                    <img width="80px" src="{{ asset('photo/sub_category') }}/{{ $subCategory->image }}" alt="{{ $subCategory->image }}">
                                                    @error('image')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Category Name<span class="text-danger">*</span></label>
                                                    <select name="category_id" id="" class="form-control">
                                                        <option value>---Select Category---</option>
                                                        @foreach ($catogories as $catogory)
                                                         <option @if ($subCategory->category_id == $catogory->id) selected @endif value="{{ $catogory->id }}">{{ $catogory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value>---Select Status---</option>
                                                        <option @if ($subCategory->status == '1') selected @endif value="1">Active</option>
                                                        <option @if ($subCategory->status == '2') selected @endif value="2">InActive</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Save</button>
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
