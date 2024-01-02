@extends('admin/layout/master')
@section('main-contant')
    <main>
      <div class="container-fluid">
        <h2 class="mt-5 mb-4">Topic Detail</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h6 class="card-title">Topic Detail Form</h6>
                <!-- <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                                  <i class="fas fa-minus"></i></button>
                                              </div> --> 
              </div>
              <div class="card-body" id="demo">
                <form action="{{url('/admin/course/add-topic-detail')}}" method="post">
                <div class="row">
                  @csrf
                  <input type="hidden" name="topic_deatil_id" value="{{$singledata!=''?$singledata->id:''}}">
                 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Enter Subject Title</label>
                      <input id="inputName" class="form-control" name="subject_title" value="{{$singledata!=''?$singledata->subject_title:old('subject_title')}}">
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('subject_title') }}</div>
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.card-body --> 
            </div>
            <!-- /.card -->
          
            <div class="card card-primary my-3">
              <div class="card-body" id="demo">
                <div class="row">
                 
 
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Number of Questions </label>
                       <input type="number" id="inputName" name="number_of_question" value="{{$singledata!=''?$singledata->number_of_question:old('number_of_question')}}" class="form-control">
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('number_of_question') }}</div>
                    @endif
                  </div>


                  <!-- <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Courses Price</label>
                      <input type="number" name="course_price" id="inputName" value="{{$singledata!=''?$singledata->course_price:old('course_price')}}" class="form-control">
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('course_price') }}</div>
                    @endif
                  </div> -->
                 
                  
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputName">Course Content</label>
                      <textarea class="form-control" name="course_content" id="course_content" style="height:300px;">{{$singledata!=''?$singledata->course_content:old('course_content')}}</textarea>
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('course_content') }}</div>
                    @endif
                  </div>
                  <div class="col-sm-12"></div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="checkbox" name="status" value="1" @if($singledata!=''){{$singledata->status==1?'checked':''}}@endif>
                      Status (Active/Inactive) </div>
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
             @if($coursetopiclist)
            <div class="card my-4">
              <div class="card-header"> <i class="fas fa-table mr-1"></i> Category List </div>
              <div class="card-body">


<div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <!-- <th>Subject</th> -->
                        <th>Subject Title</th>
                        <th>Number of Questions</th>
                        <!-- <th>Course Price</th> -->
                        <th>Course Content</th>
                        <th width="5%">Status</th>
                        <th width="5%">Edit</th>
                        <th width="5%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @foreach($coursetopiclist as $key=>$val)
                      <tr>
                        <td>{{$i}}.</td>
                        <td>{{$val->subject_title}}</td>
                        <td>{{$val->number_of_question}}</td>
                        <!-- <td>Rs. {{$val->course_price}}/-</td> -->
                        <td><?=$val->course_content?></td>

                        <td>
                            @if($val->status==1)
                              Active
                            @else
                              Deactive
                            @endif
                          </td>
                        <td><a href="{{url('/admin/course/update-topic-detail')}}/{{$val->id}}"><i class="far fa-edit"></i></a></td>
                        <td><a href="{{url('/admin/course/delete-topic-detail')}}/{{$val->id}}" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></a></td>
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
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
      CKEDITOR.replace( 'course_content' );
</script>
   @endsection