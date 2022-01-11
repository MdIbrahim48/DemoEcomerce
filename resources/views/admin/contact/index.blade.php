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
                            <li class="breadcrumb-item active">Contact</li>
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
                        <h4 class="card-title text-center" style="color: #ffffff">All Contact</h4>
                    </div>
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                <form action="{{ route('admin.contact.deleteAll') }}" method="get">
                                    @csrf
                                    <tr @if ($contact->read_status == 'unread') style="background-color:#428f6b;color:#ffffff" @endif>
                                            <td><input type="checkbox" name="checked[]" value="{{$contact->id}}"></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>
                                                <a href="{{ route('admin.contact.view',$contact->id) }}" class="btn btn-sm btn-success waves-effect waves-light">
                                                    <i class="far fa-eye d-block font-size-16 p-1"></i>
                                                </a>
                                                <a href="{{ route('admin.contact.destroy',$contact->id) }} "onclick="return confirm('Award Will Be Delete?')" class="btn btn-sm btn-danger waves-effect waves-light">
                                                    <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                                </a>
                                                <a href="{{ route('admin.contact.reply',$contact->id) }}" class="btn btn-sm btn-success waves-effect waves-light">
                                                    <i class="fas fa-reply d-block font-size-16 p-1"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @if ($contacts->count() > 1)
                                        <tr>
                                            <td><input type="submit" class="btn btn-primary" value="Delete All"> </td>
                                        </tr>
                                    @else
                                        <span></span>
                                    @endif

                                </form>
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
