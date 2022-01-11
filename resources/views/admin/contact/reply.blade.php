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
                    <a href="{{ route('admin.contact.index') }}" class="mb-sm-0 font-size-18 btn btn-primary">All Contact</a>
                 </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('partials.toast')
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-center" style="color: #ffffff">Contact Reply</h4>
                    </div>
                    <div class="card-body m-auto">

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Name </strong></th>
                                        <td>{{ $contact->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Email </strong></th>
                                        <td>{{ $contact->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Phone </strong></th>
                                        <td>{{ $contact->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Subject </strong></th>
                                        <td>{{ $contact->subject }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Message </strong></th>
                                        <td>{{ $contact->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h3>Previous Reply</h3>
                            @foreach ($all_replies as $replyItem)
                                    <span>{{$replyItem->message}}</span> <br>
                                @endforeach
                            <form action="{{ route('admin.contact.reply.submit') }}" method="POST">
                                @csrf
                                <input class="form-control" type="hidden" name="contact_id" value="{{ $contact->id }}"><br>
                                <input type="email" name="email" value="{{ $contact->email }}" class="form-control"><br>

                                <textarea name="message" id="" cols="70" rows="5" placeholder="Enter Reply"></textarea>
                                @error('message')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <input type="submit" class="btn btn-primary" value="Reply">
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
