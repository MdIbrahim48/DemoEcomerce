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
                            <li class="breadcrumb-item"><a href="{{ route('admin.homeSlider.index') }}">All Home Slider</a></li>
                            <li class="breadcrumb-item active">Home Slider</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.homeSlider.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Home Slider</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Edit Home Slider</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.homeSlider.update',$home_slider->id) }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Title <span class="text-danger">*</span> </label>
                                                    <input type="text" name="title" class="form-control" value="{{$home_slider->title ??old('title')}}" placeholder="Enter title" />
                                                    @error('title')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Sub Title <span class="text-danger">*</span> </label>
                                                    <input type="text" name="sub_title" class="form-control" value="{{$home_slider->sub_title ?? old('sub_title')}}" placeholder="Enter Sub Title" />
                                                    @error('sub_title')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Links</label>
                                                    <input type="text" name="links" class="form-control" value="{{$home_slider->links ?? old('links')}}" placeholder="Enter Links" />
                                                    @error('links')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Image <span class="text-danger">*</span> </label>
                                                    <input accept=".jpg,.png,.jpeg" type="file" name="image" class="form-control"/>
                                                    @error('image')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value>---Select Status---</option>
                                                        <option @if ($home_slider->status == '1') selected @endif value="1">Active</option>
                                                        <option @if ($home_slider->status == '2') selected @endif value="2">InActive</option>
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
