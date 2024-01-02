@extends('admin/layout/master')
@section('main-contant')
    <main>
      <div class="container-fluid">
        <h2 class="mt-5 mb-4">Add Course</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h6 class="card-title">Course Form</h6>
                <!-- <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                                  <i class="fas fa-minus"></i></button>
                                              </div> --> 
              </div>
              <div class="card-body" id="demo">
                <form action="{{url('/admin/course/add-course')}}" method="post">
                <div class="row">
                  @csrf
                  <input type="hidden" name="course_id" value="{{$singledata!=''?$singledata->id:''}}">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Course Name</label>
                      <input type="text" id="inputName" name="course_name" class="form-control" value="{{$singledata!=''?$singledata->course_name:old('course_name')}}">
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('course_name') }}</div>
                    @endif
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Courses Price</label>
                      <input type="number" name="course_price" id="inputName" value="{{$singledata!=''?$singledata->course_price:old('course_price')}}" class="form-control">
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('course_price') }}</div>
                    @endif
                  </div>
                  <div class="col-sm-12"></div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <input type="checkbox" name="show_home" value="1" @if($singledata!=''){{$singledata->show_home==1?'checked':''}}@endif>
                    &nbsp; Show Home 
                      </div>
                  </div>
                  <div class="col-sm-12"></div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <input type="checkbox" name="status" value="1" @if($singledata!=''){{$singledata->status==1?'checked':''}}@endif>
                    &nbsp; Status (Active/Inactive)
                      </div>
                  </div>
                    
                    <div class="form-group">
                      <label for="inputName">&nbsp;</label>
                      <div class="clear"></div>
                      <input type="submit" value="Submit" class="btn btn-success float-right">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body --> 
            </div>
            <!-- /.card -->
            @if(count($courselist)>0)
            <div class="card my-4">
              <div class="card-header"> <i class="fas fa-table mr-1"></i> Subject List </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%">S.No.</th>
                        <th width="55%">Course Name</th>
                        <th>Course Price</th>
                        <th width="5%">Status</th>
                        <th width="5%">Edit</th>
                        <th width="5%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @foreach($courselist as $key=>$val)
                        <tr>
                          <td>{{$i}}.</td>
                          <td> {{$val->course_name}}</td>
                          <td>Rs. {{$val->course_price}}/-</td>
                          <td>
                            @if($val->status==1)
                              Active
                            @else
                              Deactive
                            @endif
                          </td>
                          <td><a href="{{url('/admin/course/update-course')}}/{{$val->id}}"><i class="far fa-edit"></i></a></td>
                          <td><a href="{{url('/admin/course/delete-course')}}/{{$val->id}}" onclick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                        @php $i=$i+1; @endphp
                      @endforeach
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