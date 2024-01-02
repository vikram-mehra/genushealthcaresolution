@php
  use App\Http\Controllers\Admin\Course\CourseAssignTopicControllers;
@endphp
@extends('admin/layout/master')
@section('main-contant')

    <main>
      <div class="container-fluid">
        <h2 class="mt-5 mb-4">Assign Topic</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h6 class="card-title">Assign Topic Form</h6>
                <!-- <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                                  <i class="fas fa-minus"></i></button>
                                              </div> --> 
              </div>
              <div class="card-body" id="demo">
                <form action="{{url('/admin/course/assign-topic')}}" method="post">
                <div class="row">
                  @csrf
                  <input type="hidden" name="assign_topic_id" value="{{$singledata!=''?$singledata->id:''}}">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Select Course Name</label>
                      <select class="form-control" name="course_id">
                        <option value="">Select</option>
                        @foreach($course as $key=>$val)
                          <option value="{{$val->id}}" @if(!empty($singledata)){{$singledata->course_id==$val->id?'selected':''}} @endif>{{$val->course_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    @if (!empty($errors))
                    <p style="color:red" >{{ $errors->first('course_id') }}</p>
                    @endif  
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Select Course Topic</label>
                      <select class="form-control" name="course_topic_id[]"  multiple="multiple" id="course_topic_id">
                        @foreach($coursetopics as $key=>$val)
                          <option value="{{$val->id}}" @if(!empty($singledata)){{in_array($val->id,explode(',',$singledata->course_topic_id))?'selected':''}} @endif>{{$val->subject_title}}</option>
                        @endforeach
                      </select>
                    </div>
                   @if (!empty($errors))
                    <p style="color:red" >{{ $errors->first('course_topic_id') }}</p>
                    @endif  
                  </div>
                  <div class="col-sm-12"></div>
                 <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputName">&nbsp;</label>
                      <div class="clear"></div>
                      <input type="submit" value="Submit" class="btn btn-success float-right">
                    </div>
                  </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body --> 
            </div>
            <!-- /.card -->
          @if(empty($singledata))
            <div class="card my-4">
              <div class="card-header"> <i class="fas fa-table mr-1"></i> Subject List </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%">S.No.</th>
                        <th width="55%">Course Name</th>
                        <th>Course Topic</th>
                        <th width="5%">Edit</th>
                        <th width="5%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($assignTopic as $key => $val)
                     <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{$val->course_name}}</td>
                       <td>
                        
                         @php
                           $courseTopic = CourseAssignTopicControllers::TOPIC($val->course_topic_id);
                           
                         @endphp  
                           @foreach($courseTopic as $key=>$topic)
                              {{$topic->subject_title}}, 
                           @endforeach
                         
                       </td>
                       <td><a href="{{url('/admin/course/update-assign-topic')}}/{{$val->id}}"><i class="far fa-edit"></i></a></td>
                       <td><a href="{{url('/admin/course/delete-assign-topic')}}/{{$val->id}}" onclick="return confirm('Are you sure want to delete this question?')"><i class="far fa-trash-alt"></i></a></td>          
                     </tr>
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
   <script>
      $(document).ready(function() {
            $('#course_topic_id').select2();
        })
   </script>
   @endsection