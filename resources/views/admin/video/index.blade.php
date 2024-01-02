@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Video</h2>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($id))
                    <form action="{{ url('/admin/update-video') }}/{{$id}}" method="post" enctype="multipart/form-data">
                    @else 
                    <form action="{{ url('/admin/save-video') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Video Form</h6>
                            </div>

                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Video Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ (isset($video->name)) ? $video->name : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="link">Video Link (YouTube)</label>
                                            <input type="text" id="link" name="link" class="form-control" value="{{ (isset($video->link)) ? $video->link : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('link') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="isHome" {{ (isset($video->isHome) && $video->isHome == 1) ? 'checked' : '' }}>
                                            Show on home page
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
                                            <th>Video Name</th>
                                            <th>Video Link (YouTube)</th>
                                            <th width="5%">On Home</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($videos))
                                        @foreach($videos as $video)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $video->name }}</td>
                                            <td>{{ $video->link }}</td>
                                            <td>{{ ($video->isHome == 1) ? 'Active' : 'Deactive' }}</td>
                                            <td><a href="{{url('/admin/edit-video')}}/{{$video->id}}"><i class="far fa-edit"></i></a></td>
                                            <td>
                                                <a href="{{ route('destroy-video', ['id' => $video->id]) }}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a>
                                            </td>
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
    <!-- <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        var video = CKEDITOR.replace( 'content' );
        video.config.allowedContent = true;
        video.config.extraAllowedContent = '*(*)';
    </script> -->
@endsection