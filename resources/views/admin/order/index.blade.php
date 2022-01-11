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
                            <li class="breadcrumb-item active">Order</li>
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
                        <h4 class="card-title text-center" style="color: #ffffff">All Order</h4>
                    </div>
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Id</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr @if ($order->read_status == 'unread') style="background-color:#428f6b;color:#ffffff" @endif>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>
                                            @if ( $order->status == 'Receiving')
                                            <span class="badge bg-primary">Receiving</span>
                                            @elseif ( $order->status == 'Completed')
                                                <span class="badge bg-success">Completed</span>
                                            @elseif ( $order->status == 'Pickup')
                                                <span class="badge bg-info">Pickup</span>
                                            @elseif ( $order->status == 'Processing')
                                                <span class="badge bg-secondary">Processing</span>
                                            @elseif ( $order->status == 'Cancel')
                                                <span class="badge bg-danger">Cancel</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                       <td>
                                            <a href="{{route('admin.order.edit',$order->id)}}" class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="mdi mdi-pencil d-block font-size-16"></i>
                                            </a>
                                            <a href="{{ route('admin.order.view',$order->id) }}" class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="far fa-eye d-block font-size-16 p-1"></i>
                                            </a>
                                            <a href="{{ route('admin.order.destroy',$order->id) }}" onclick="return confirm('Order Will Be Delete?')" class="btn btn-sm btn-danger waves-effect waves-light">
                                                <i class="mdi mdi-trash-can d-block font-size-16"></i>
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
