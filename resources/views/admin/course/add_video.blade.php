@extends('admin/layout/master')
@section('main-contant')
    <main>
      <div class="container-fluid">
        <h2 class="mt-5 mb-4">Add Video</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h6 class="card-title">Add Video Form</h6>
                 
              </div>
              <div class="card-body" id="demo">
                <form action="{{url('/admin/add-video')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="video_id" value="{{$singledata!=''?$singledata->id:''}}">
                  @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Select Course</label>
                      <select id="course_id" class="form-control" name="course" onchange="CourseTopic()">
                        <option value="">-- Select --</option>
                        @foreach($courselist as $key=>$val)
                          <option value="{{$val->id}}" @if($singledata!=''){{$singledata->course_id==$val->id?'selected':''}}@endif>{{$val->course_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('course') }}</div>
                    @endif
                  </div>


 <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Select Topic</label>
                      <select id="topic" name="topic" class="form-control" required>
                        <option value="">-- Select --</option>
                        @foreach($topiclist as $key=>$val)
                          <option value="{{$val->id}}" {{$singledata->topic_id==$val->id?'selected':''}}>{{$val->subject_title}}</option>
                        @endforeach
                      </select>
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('topic') }}</div>
                    @endif
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name">Video Name</label>
                      <input type="text" id="name" name="name" value="{{$singledata!=''?$singledata->name:old('name')}}" class="form-control" required>
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('name') }}</div>
                    @endif
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Video Link (YouTube)</label>
                      <input type="text" id="video_link" name="video_link" value="{{$singledata!=''?$singledata->video_link:old('video_link')}}" class="form-control" >
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('video_link') }}</div>
                    @endif
                  </div>


               <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Video Vimeo</label>
                      <input id="video_vimeo" name="video_vimeo" value="{{$singledata!=''?$singledata->video_vemio:old('video_vimeo')}}" class="form-control" >
                    </div>
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('video_vimeo') }}</div>
                    @endif
                  </div>


                 <div class="col-sm-6">
                    <div class="form-group">
                      <label for="inputName">Upload Video</label>
                      
                      <input type="hidden" name="oldupload_video" value="{{$singledata!=''?$singledata->upload_video:''}}">
                      <input type="file" name="upload_video" id="upload_video" value="" accept="video/mp4,video/x-m4v,video/*" class="form-control" >
                    </div>
                  </div>
                    <div class="col-sm-6">
                      @if($singledata!='')
                          <video width="150" height="100" controls>
                              <source src="{{asset('public')}}/{{$singledata->upload_video}}" type="video/mp4">
                          </video>
                      @endif
                    </div>
                  <div class="col-sm-6"></div>
                  <div class="col-sm-6">
                    @if (!empty($errors))
                        <div style="color:red">{{ $errors->first('upload_video') }}</div>
                    @endif
                    <input type="checkbox" name="status" value="1" @if($singledata!=''){{$singledata->status==1?'checked':''}}@endif>
                    <label for="inputName">Active/Deactive</label>
                  </div>



                </div>
              
              </div>
              <!-- /.card-body --> 
            </div>
            <!-- /.card -->
            
         
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
           @if($videolist) 
            <div class="card my-4">
              <div class="card-header"> <i class="fas fa-table mr-1"></i>  Video List </div>
              <div class="card-body">


              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Select Course</th>
                        <th>Select Topic</th>
                        <th>Video Link (YouTube)</th>
                        <th>Video Vimeo</th>
                         <th>Upload Video</th>
                         
                         
                        <th width="5%">Status</th>
                        <th width="5%">Edit</th>
                        <th width="5%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @foreach($videolist as $key=>$val)
                      <tr>
                        <td>{{$i}}.</td>
                        <td>{{$val->course_name}}</td>
                        <td>{{$val->subject_title}}</td>
                        <td>{{$val->video_link}}</td>
                        <td>{{$val->video_vemio}}</td>
                        <td>
                          @if($val->video_link || $val->video_vemio)
                            <iframe src="{{($val->video_link) ? $val->video_link : $val->video_vemio}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen  style="width:200px; height:150px;"></iframe>
                          @else
                            <video width="200" height="150" controls="controls">
                              <source src="{{asset('public')}}/{{$val->upload_video}}" type="video/mp4">
                            </video>
                          @endif
                        </td>
                        <td>
                        @if($val->status==1)
                          Active
                        @else
                          Deactive
                        @endif
                        
                        </td>
                        <td>
                          <a href="{{url('/admin/update-video')}}/{{$val->id}}"><i class="far fa-edit"></i></a></td>
                        <td><a href="{{url('/admin/delete-video')}}/{{$val->id}}" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></a>
                        </td>
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

<script>
  function CourseTopic(){
    var course_id = $('#course_id').val();

    if(course_id!=''){
      $.ajax({
          type: 'post',
          url : "{{url('/admin/get-topic-ajax')}}",
          data: {
            course_id : course_id,
            _token    : "{{csrf_token()}}"
          },
          success:function(res){
            $('#topic').empty();
            var o = new Option("--Select--", "")
              res.forEach(function (row) {
                  let o = new Option(row.subject_title, row.id);
                  $('#topic').append(o);
              });
          }
      });
    }
  }
</script>
   @endsection