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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dealsOfTheDay.index') }}">All DealsOfTheDay</a></li>
                            <li class="breadcrumb-item active">DealsOfTheDay</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.dealsOfTheDay.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All DealsOfTheDay</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Add DealsOfTheDay</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.dealsOfTheDay.store') }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Date And Time <span class="text-danger">*</span> </label>
                                                    <input type="datetime-local" name="date" class="form-control" value="{{old('date')}}" placeholder="Enter Date And Time"/>
                                                    @error('date')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product <span class="text-danger">*</span></label>
                                                    <select name="product_id" id="" class="form-control">
                                                        <option value>---Select Prodcut---</option>
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('status')
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
