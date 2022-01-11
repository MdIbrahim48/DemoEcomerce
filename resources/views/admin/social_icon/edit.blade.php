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
                            <li class="breadcrumb-item"><a href="{{ route('admin.socialIcon.index') }}">All Social Icon</a></li>
                            <li class="breadcrumb-item active">Social Icon</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.socialIcon.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Social Icon</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Add Social Icon</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.socialIcon.update',$socialIcon->id) }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Social Icon Class <span class="text-danger">*</span> </label>
                                                    <input type="text" name="icon" class="form-control" value="{{$socialIcon->icon ?? old('icon')}}" placeholder="Enter icon"/>
                                                    @error('icon')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Social Icon Link <span class="text-danger">*</span> </label>
                                                    <input type="text" name="link" class="form-control" value="{{ $socialIcon->link ?? old('link')}}" placeholder="Enter Icon Link"/>
                                                    @error('link')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value>---Select Status---</option>
                                                        <option @if ($socialIcon->status == '1') selected @endif value="1">Active</option>
                                                        <option @if ($socialIcon->status == '2') selected @endif value="2">InActive</option>
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
