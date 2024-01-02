@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Team Details</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title">Team Form</h6>
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                  <i class="fas fa-minus"></i></button>
                                </div> --> 
                        </div>
                        <!-- /.card-body --> 
                    </div>
                    <!-- /.card -->
                    @if(isset($id))
                    <form action="{{ url('/admin/update-team-detail') }}/{{$id}}" method="post" enctype="multipart/form-data">
                    @else 
                    <form action="{{ url('/admin/save-team-details') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card card-primary my-3">
                            <div class="card-body" id="demo" style="background:#f5f7f9">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Name </label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ (isset($teamDetail->name)) ? $teamDetail->name : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('name') }}</div>
                                        @endif

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="designation">Designation</label>
                                            <input id="designation" name="designation" class="form-control" value="{{ (isset($teamDetail->designation)) ? $teamDetail->designation : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('designation') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="photo">Upload Photo</label>
                                            <input type="file" name="photo" class="form-control"  accept="image/png, image/gif, image/jpeg">
                                            <div class="clear">(Size: width=480px, height=480px)</div>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('photo') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="content">Team Content</label>
                                            <textarea id="content" class="form-control textarea" name="content">{{ (isset($teamDetail->content)) ? $teamDetail->content : '' }}</textarea>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('content') }}</div>
                                        @endif
                                    </div>
                                    <!-- <div class="col-sm-12"><a href="#" style="float: right; font-weight:600; text-decoration: none;">Add More +</a>
                                    </div> -->
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="status" {{ (isset($teamDetail->status) && $teamDetail->status == 1) ? 'checked' : '' }}>
                                            Status (Active/Inactive) 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body --> 
                        </div>
                        <!-- card -->
                        <div class="card-body" id="demo">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" value="{{ (isset($id)) ? 'Update' : 'Submit' }}" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                    </form>
                    @if(! isset($id))
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Upload Photo</th>
                                            <th>Team Content</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($teamDetails))
                                        @foreach($teamDetails as $details)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $details->name }}</td>
                                                <td>{{ $details->designation }}</td>
                                                <td><img src="{{ asset('team/images')}}/{{ $details->photo }}" style="width: 100px; height: 100px;"></td>
                                                <td>{{ $details->content }}</td>
                                                <td>{{ ($details->status == 1) ? 'Active' : 'In Active' }}</td>
                                                <td><a href="{{url('/admin/edit-team-detail')}}/{{$details->id}}"><i class="far fa-edit"></i></a></td>
                                                <td><a href="{{url('/admin/delete-team-detail')}}/{{$details->id}}" onclick="return confirm('Are you sure want to delete this detail?')"><i class="far fa-trash-alt"></i></a></td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end --> 
                </div>
            </div>
        </div>
    </main>
@endsection

@section('javascript')
@endsection