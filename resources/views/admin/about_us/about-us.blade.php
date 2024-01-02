@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">About Content</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title">About Content Form</h6>
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                  <i class="fas fa-minus"></i></button>
                                </div> --> 
                        </div>
                        <!-- /.card-body --> 
                    </div>
                    <!-- /.card -->
                    <form action="{{ url('/admin/update-content') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $aboutUs->id }}">
                        <div class="card card-primary my-3">
                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="inputName">About Content</label>
                                            <textarea id="aboutus" name="content" class="form-control" style="height:300px;" placeholder="ckeditor" required><?=$aboutUs->content?></textarea>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('content') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body --> 
                        </div>
                        <!-- /.card --> 
                        <!-- <div class="card card-primary my-3">
                            <div class="card-body" id="demo">
                                 <div class="row">
                                      <div class="col-sm-12"> 
                                          <h4>Included</h4>
                                      </div>
                                      <div class="col-sm-9">
                                          <div class="form-group">
                                         <label for="inputName">Point</label>
                                         <input id="inputName" class="form-control" placeholder="">
                                       </div>
                                      </div>
                                      <div class="col-sm-3">
                                          <a href="#" style="float: right; margin: 30px 0 0 0;">+ Add More</a>
                                      </div>
                               </div>
                            </div>
                            </div>--> 
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
                                            <th>About Content </th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Genus Healthcare Solution has been a part of the US & Indian healthcare industry circuit solidifying its position now for close to two decades.
                                                We are emerging as a competent contender in (BPM) Business Process Management offering services in verticals like Medical Billing, Coding et al; designing tailored solutions and serving some leading and well-known healthcare companies in the US including pharmaceutical, biotech and healthcare institutions.
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
        CKEDITOR.replace( 'aboutus' );
    </script>
@endsection