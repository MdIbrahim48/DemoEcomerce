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
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">All Product</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.product.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Product</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Add Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product Title <span class="text-danger">*</span> </label>
                                                    <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Enter title" />
                                                    @error('title')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product Price <span class="text-danger">*</span> </label>
                                                    <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="Enter price" />
                                                    @error('price')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product Discount Percent <span class="text-danger">*</span> </label>
                                                    <input type="text" name="percent" class="form-control" value="{{old('percent')}}" placeholder="Enter discount percent"/>
                                                    @error('percent')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product Image <span class="text-danger">*</span> </label>
                                                    <input multiple accept=".jpg,.png,.jpeg" type="file" name="image[]" class="form-control"/>
                                                    @error('image')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product sku <span class="text-danger">*</span> </label>
                                                    <input type="text" name="sku" class="form-control" value="{{old('sku')}}" placeholder="Enter sku"/>
                                                    @error('sku')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product quantity <span class="text-danger">*</span> </label>
                                                    <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}" placeholder="Enter quantity"/>
                                                    @error('quantity')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Product stock <span class="text-danger">*</span> </label>
                                                    <input type="number" name="stock" class="form-control" value="{{old('stock')}}" placeholder="Enter Product Stock"/>
                                                     @error('stock')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Category Name<span class="text-danger">*</span> </label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value>----Select Category----</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                     @error('category_id')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Sub Category Name<span class="text-danger">*</span></label>
                                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                                        <option value>----Select SubCategory----</option>

                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Summary</label>
                                                    <textarea name="summary" cols="30" rows="5" class="form-control" >{{old('summary')}}</textarea>
                                                    @error('summary')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" id="ckeditor-classic" class="form-control" >{{old('description')}}</textarea>
                                                    @error('description')
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

         <script>
            $('#category_id').change(function(){
                let category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        type:'GET',
                        url:"{{url('/admin/product/get-subcat-api')}}/"+category_id,
                        success:function(e){
                            if (e) {
                                $('#subcategory_id').empty();
                                $('#subcategory_id').append("<option value>Select One</option>");
                                $.each(e,function(key,value){
                                    $('#subcategory_id').append('<option value="'+value.id+'">'+value.name+'</option>')
                                })
                            } else {
                                $('#subcategory_id').empty();
                            }
                        }
                    })
                } else {
                    $('#subcategory_id').empty();
                }
            })
        </script>

    @endsection

@endsection
