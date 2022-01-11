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
                    <a href="{{ route('admin.review.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Review</a>
                 </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Review</h4>
                    </div>
                    <div class="card-body m-auto">

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Name </strong></th>
                                        <td>{{ $review->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Email </strong></th>
                                        <td>{{ $review->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Reting </strong></th>
                                        <td>{{ $review->reting }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Comment </strong></th>
                                        <td>{{ $review->comment }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
