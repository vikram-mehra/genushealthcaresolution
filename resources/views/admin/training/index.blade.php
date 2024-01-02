@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Training</h2>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($id))
                    <form action="{{ url('/admin/update-training') }}/{{$id}}" method="post" enctype="multipart/form-data">
                    @else 
                    <form action="{{ url('/admin/save-training') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Training Form</h6>
                                <!-- <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                      <i class="fas fa-minus"></i></button>
                                    </div> --> 
                            </div>

                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="heading">Course Heading</label>
                                            <input type="text" id="heading" name="heading" class="form-control" value="{{ (isset($training->heading)) ? $training->heading : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('heading') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="photo">Course Photo</label>
                                            <input type="file" name="photo" class="form-control"  accept="image/png, image/gif, image/jpeg">
                                            <!-- <div class="clear">(Size: width=400px, height=400px)</div> -->
                                            <div class="clear">
                                                <strong>Home page Size: </strong> ( width=186px, height=184px), <br><strong>Training page Size: </strong>(width=400px, height=400px)
                                            </div>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('photo') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="short_content">Small Content</label>
                                            <textarea class="form-control textarea2" id="short_content" name="short_content" rows="5" cols="5" required>{{ (isset($training->short_content)) ? $training->short_content : '' }}</textarea>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('short_content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="content">Course Content</label>
                                            <textarea id="courseContent" class="form-control textarea" name="content">{{ (isset($training->content)) ? $training->content : '' }}</textarea>

                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="status" {{ (isset($training->status) && $training->status == 1) ? 'checked' : '' }}>
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
                                            <th>Course Heading</th>
                                            <th>Course Content</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($trainings))
                                        @foreach($trainings as $training)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $training->heading }}</td>
                                            <td><?=$training->short_content?></td>
                                            <td>{{ ($training->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td><a href="{{url('/admin/edit-training')}}/{{$training->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('/admin/delete-training')}}/{{$training->id}}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a></td>
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
        var training = CKEDITOR.replace( 'courseContent' );
        training.config.allowedContent = true;
        training.config.extraAllowedContent = '*(*)';
    </script>
@endsection