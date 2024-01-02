@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">About Company</h2>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($id))
                    <form action="{{ url('/admin/update-company-details') }}/{{$id}}" method="post" enctype="multipart/form-data">
                    @else 
                    <form action="{{ url('/admin/save-company-details') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">About Company Form</h6>
                            </div>

                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" name="title" class="form-control" value="{{ (isset($company->title)) ? $company->title : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="photo">Upload Photo</label>
                                            <input type="file" name="photo" class="form-control"  accept="image/png, image/gif, image/jpeg">
                                            <!-- <div class="clear">(Size: width=400px, height=400px)</div> -->
                                            <div class="clear">
                                                (Size: width=636px, height=460px)
                                            </div>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('photo') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="content">Short Content</label>
                                            <textarea class="form-control textarea2" id="content" name="content" rows="5" cols="5" required>{{ (isset($company->content)) ? $company->content : '' }}</textarea>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="status" {{ (isset($company->status) && $company->status == 1) ? 'checked' : '' }}>
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
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Upload Photo</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($companyDetails))
                                        @foreach($companyDetails as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->title }}</td>
                                            <td>{{ $company->content }}</td>
                                            <td>
                                                <img src="{{ asset('admin/images/company/636x460')}}/{{ $company->photo }}" style="width:100px; height: 60px;">
                                            </td>
                                            <td>{{ ($company->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td><a href="{{url('/admin/edit-company-details')}}/{{$company->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('/admin/delete-company-details')}}/{{$company->id}}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a></td>
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