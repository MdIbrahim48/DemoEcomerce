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
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.product.create') }}" class="mb-sm-0 font-size-18 btn btn-primary"><i class="fas fa-plus"></i> Add Product</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">All Product</h4>
                    </div>
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                {{-- <th>Image</th> --}}
                                <th>title</th>
                                <th>price</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Edited By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        {{-- <td>
                                            @if(count($products['images']) > 0)
                                                <div class="d-flex">
                                                    @foreach($products['images'] as $pImage)
                                                        <div class="" style="margin-right:10px">
                                                            <img width="100px" src="{{ asset($pImage['image']) }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td> --}}
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            @if ( $product->status == '1')
                                            <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">In Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->created_by }}</td>
                                        <td>{{ $product->edited_by }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="mdi mdi-pencil d-block font-size-16"></i>
                                            </a>
                                            <a href="{{ route('admin.product.destroy',$product->id) }} "onclick="return confirm('Product Will Be Delete?')" class="btn btn-sm btn-danger waves-effect waves-light">
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
