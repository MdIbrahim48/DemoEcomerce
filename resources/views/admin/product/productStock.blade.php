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
                        <h5>Product Stock Filtering</h5>
                        <form method="post" action="{{ route('admin.product.stockFiltering')}}">
                            @csrf
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">From <span class="text-danger">*</span> </label>
                                    <input type="number" name="from" class="form-control"/>
                                    @error('from')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">To <span class="text-danger">*</span> </label>
                                    <input type="number" name="to" class="form-control"/>
                                     @error('to')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary justify-content-center m-auto">Filtering</button>
                            </div>
                            </div>
                        </form> <br>

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Stock</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr @if ($product->stock <= 2) style="background-color:#428f6b;color:#ffffff" @endif>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->stock }}</td>
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
