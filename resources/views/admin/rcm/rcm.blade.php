@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">RCM</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title">RCM  Form</h6>
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                  <i class="fas fa-minus"></i></button>
                                </div> --> 
                        </div>
                        <!-- /.card-body --> 
                    </div>
                    <!-- /.card -->
                    <form action="{{ url('/admin/update-rcm-content') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $rcm->id }}">
                        <div class="card card-primary my-3">
                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="inputName">RCM Content</label>
                                            <textarea id="rcmContent" name="content" class="form-control" style="height:300px;" placeholder="ckeditorK" required><?=$rcm->content?></textarea>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="status" {{ ($rcm->status == 1) ? 'checked' : '' }}>
                                            Status (Active/Inactive) 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body --> 
                        </div>
                        <!-- /.card -->
                        <!-- card -->
                        <div class="card-body" id="demo">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- card -->
                    {{--<div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>RCM Content </th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Revenue Cycle Management
                                                As one of the leading providers of medical billing services, Genus Healthcare has the experience to provide you with multi-specialty medical billing services utilizing a management team that has been together for more than 20 years. Genus Healthcare met mandatory Compliance/HIPAA standards. Genus Healthcare can assure you the highest level of security and protection of PHI. Operating for more than 5 years providing healthcare revenue Cycle Management Services to over 100 physicians across the country. Genus Healthcare affords you the highest level of medical billing and collections services along with the expertise to help you navigate the constant changing healthcare environment.
                                            </td>
                                            <td>Active</td>
                                            <td><a href="#"><i class="far fa-edit"></i></a></td>
                                            <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>--}}
                    <!-- end --> 
                </div>
            </div>
        </div>
    </main>
@endsection

@section('javascript')
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        var editor1 = CKEDITOR.replace( 'rcmContent' );
        editor1.config.allowedContent = true;
        editor1.config.extraAllowedContent = '*(*)';
    </script>
@endsection