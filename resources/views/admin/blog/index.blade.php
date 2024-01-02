@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Blog</h2>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($id))
                    <form action="{{ url('/admin/update-blog') }}/{{$id}}" method="post" enctype="multipart/form-data">
                    @else 
                    <form action="{{ url('/admin/save-blog') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Blog Form</h6>
                                <!-- <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                      <i class="fas fa-minus"></i></button>
                                    </div> --> 
                            </div>

                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="heading">Blog Heading</label>
                                            <input type="text" id="heading" name="heading" class="form-control" value="{{ (isset($blog->heading)) ? $blog->heading : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('heading') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="photo">Blog Photo</label>
                                            <input type="file" name="photo" class="form-control" accept="image/png, image/gif, image/jpeg">
                                            <div class="clear">(Size: width=418px, height=346px), (Size: width=740px, height=614px)</div>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('photo') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="short_content">Short Content</label>
                                            <textarea class="form-control textarea2" id="short_content" name="short_content" rows="5" cols="5" required>{{ (isset($blog->short_content)) ? $blog->short_content : '' }}</textarea>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('short_content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="full_content">Full Content</label>
                                            <textarea id="full_content" class="form-control textarea" name="full_content">{{ (isset($blog->full_content)) ? $blog->full_content : '' }}</textarea>

                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('full_content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="status" {{ (isset($blog->status) && $blog->status == 1) ? 'checked' : '' }}>
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
                                            <th>Blog Heading</th>
                                            <th>Blog Photo</th>
                                            <th>Short Content</th>
                                            <th>Full Content</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($blogs))
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $blog->heading }}</td>
                                            <td>
                                                <img src="{{ asset('admin/images/blog/418x346')}}/{{ $blog->photo }}" style="width:100px; height: 100px;">
                                            </td>
                                            <td>{{ $blog->short_content }}</td>
                                            <td><?=$blog->full_content?></td>
                                            <td>{{ ($blog->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td><a href="{{url('/admin/edit-blog')}}/{{$blog->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('/admin/delete-blog')}}/{{$blog->id}}" onclick="return confirm('Are you sure want to delete this blog?')"><i class="far fa-trash-alt"></i></a></td>
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
        var blog = CKEDITOR.replace( 'full_content' );
        blog.config.allowedContent = true;
        blog.config.extraAllowedContent = '*(*)';
    </script>
@endsection