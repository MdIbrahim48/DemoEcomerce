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
                            <li class="breadcrumb-item active">Review</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">All Review</h4>
                    </div>
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr @if ($review->read_reting == 'unread') style="background-color:#428f6b;color:#ffffff" @endif>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->email }}</td>
                                        <td>
                                            @if ($review->status==1)
                                            <a href="{{route('admin.review.status', $review->id)}}" class="btn btn-warning">Pending</a>
                                            @else
                                            <a href="{{route('admin.review.status', $review->id)}}" class="btn btn-primary">Approved</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.review.view',$review->id) }}" class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="far fa-eye d-block font-size-16 p-1"></i>
                                            </a>
                                            <a href="{{ route('admin.review.destroy',$review->id) }} "onclick="return confirm('Review Will Be Delete?')" class="btn btn-sm btn-danger waves-effect waves-light">
                                                <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                            </a>
                                            <a href="{{ route('admin.review.reply',$review->id) }}" @if ($review->reply_status == '1') class="btn btn-sm btn-info waves-effect waves-light" @endif class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="fas fa-reply d-block font-size-16 p-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

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
