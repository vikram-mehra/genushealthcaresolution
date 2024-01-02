@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Career</h2>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($id))
                    <form action="{{ url('/admin/update-career') }}/{{$id}}" method="post">
                    @else 
                    <form action="{{ url('/admin/save-career') }}" method="post">
                    @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Career Form</h6>
                                <!-- <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                      <i class="fas fa-minus"></i></button>
                                    </div> --> 
                            </div>

                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="heading">Profile Heading</label>
                                            <input type="text" id="heading" name="heading" class="form-control" value="{{ (isset($career->heading)) ? $career->heading : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('heading') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="experience">Experience</label>
                                            <input id="experience" name="experience" class="form-control" value="{{ (isset($career->experience)) ? $career->experience : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('experience') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input id="location" name="location" class="form-control" value="{{ (isset($career->location)) ? $career->location : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('location') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" name="email" class="form-control" value="{{ (isset($career->email)) ? $career->email : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control textarea" name="description">{{ (isset($career->description)) ? $career->description : '' }}</textarea>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="status" {{ (isset($career->status) && $career->status == 1) ? 'checked' : '' }}>
                                            Status (Active/Inactive) 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-body --> 
                        </div>
                        <!-- /.card -->
                        <div class="card-body" id="demo">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" value="{{ (isset($id)) ? 'Update' : 'Submit' }}" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </form>
                        <!-- card -->
                    @if(! isset($id))
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> Category List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Profile Heading</th>
                                            <th>Experience</th>
                                            <th>Location</th>
                                            <th>Email</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($careers))
                                        @foreach($careers as $career)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $career->heading }}</td>
                                            <td>{{ $career->experience }}</td>
                                            <td>{{ $career->location }}</td>
                                            <td>{{ $career->email }}</td>
                                            <td>{{ ($career->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td><a href="{{url('/admin/edit-career')}}/{{$career->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('/admin/delete-career')}}/{{$career->id}}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a></td>
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
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection