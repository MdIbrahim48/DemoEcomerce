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
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">All Category</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.category.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Category</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Add Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Category Name <span class="text-danger">*</span> </label>
                                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name" required/>
                                                    @error('name')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Category Image <span class="text-danger">*</span> </label>
                                                    <input type="file" name="image" class="form-control"/>
                                                    @error('image')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Category BG Color<span class="text-danger">*</span></label>
                                                    <select name="cat_bg_color" id="" class="form-control">
                                                        <option value>---Select Category BG Color---</option>
                                                        <option value="bg-10">bg-10</option>
                                                        <option value="bg-11">bg-11</option>
                                                        <option value="bg-12">bg-12</option>
                                                        <option value="bg-13">bg-13</option>
                                                        <option value="bg-14">bg-14</option>
                                                        <option value="bg-15">bg-15</option>
                                                    </select>
                                                    @error('cat_bg_color')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                 </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value>---Select Status---</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">InActive</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
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
