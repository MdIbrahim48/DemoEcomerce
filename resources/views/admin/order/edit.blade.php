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
                            <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">All Coupon</a></li>
                            <li class="breadcrumb-item active">Coupon</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.order.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Coupon</a>
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
                                            <form method="post" action="{{ route('admin.order.update',$order->id) }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value>---Select Status---</option>
                                                        <option @if ($order->status == 'Receiving') selected @endif value="Receiving">Receiving</option>
                                                        <option @if ($order->status == 'Processing') selected @endif value="Processing">Processing</option>
                                                        <option @if ($order->status == 'Pickup') selected @endif value="Pickup">Pickup</option>
                                                        <option @if ($order->status == 'Pending') selected @endif value="Pending">Pending</option>
                                                        <option @if ($order->status == 'Cancel') selected @endif value="Cancel">Cancel</option>
                                                        <option @if ($order->status == 'Completed') selected @endif value="Completed">Completed</option>
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
