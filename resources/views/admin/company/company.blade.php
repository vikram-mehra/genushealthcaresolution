@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Company</h2>
            <div class="row">
                <div class="col-md-12">
                  
                    <form action="{{url('/admin/company')}}" method="post">
                        <input type="hidden" name="company_id" value="{{$singleData!=''?$singleData->id:''}}">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Company Form</h6>
                                <!-- <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                      <i class="fas fa-minus"></i></button>
                                    </div> --> 
                            </div>

                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="heading">Company Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{$singleData!=''?$singleData->name:''}}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        <!-- /.card-body --> 
                        </div>
                        <!-- /.card -->
                        <div class="card-body" id="demo">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </form>
                        <!-- card -->
                    @if($CompanyList)
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> Company List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">S.No.</th>
                                            <th>Company Name</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($CompanyList['CompanyList'] as $val)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$val->name}}</td>
                                            <td><a href="{{url('admin/update-company/')}}/{{$val->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('admin/delete-company/')}}/{{$val->id}}" onclick="return confirm('Are you sure want to delete this company?')"><i class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                        @php $i=$i+1; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="float: right;">
                                {{$CompanyList['CompanyList']->links()}}
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