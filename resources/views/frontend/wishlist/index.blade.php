@extends('layouts.frontend.frontend_app')

@section('frontend_title')
    Wishlist
@endsection

@section('frontend_content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('frontend.home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> Wishlist
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>
                </div>
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody id="wishlist">
                            @include('frontend.includes.all_wishlist')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

    @section('frontend_scripts')
        <script>
        function wishlistRemove(y){
                $.ajax({
                    type:'GET',
                    url:'{!!URL::to('wishlist/remove')!!}',
                    data:{'productId':y},
                    success:function(response){
                        location.reload();
                        $('#wishlist').html(response.view);;
                    },
                });
            }
        </script>

    @endsection
@endsection
