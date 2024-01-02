@extends('admin/layout/master')
@section('main-contant')
<main>
    <div class="container-fluid">
        <h2 class="mt-5 mb-4">View Register HR's</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- /.card -->
                <div class="card my-4">
                    <div class="card-header"> <i class="fas fa-table mr-1"></i> HR List </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%">S.No.</th>
                                        <th width="20%">Name</th>
                                        <th width="20%">Email</th>
                                        <th width="20%">Phone</th>
                                        <th width="5%">Edit</th>
                                        <th width="5%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(! empty($hrDetails))
                                    @foreach($hrDetails as $details)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td> {{$details->name}}</td>
                                        <td>{{$details->email}}</td>
                                        <td>{{$details->phone}}</td>
                                        <td><a href="{{url('/admin/hr/edit')}}/{{$details->id}}"><i class="far fa-edit"></i></a></td>
                                        <td><a href="{{url('/admin/hr/delete')}}/{{$details->id}}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end --> 
            </div>
        </div>
    </div>
</main>
@endsection
@section('javascript')
@endsection