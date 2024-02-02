@extends('admin/layout/master')
@section('main-contant')
<main>
  <div class="container-fluid">
    <h2 class="mt-5 mb-4">Add PDf</h2>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h6 class="card-title">Add PDf Form</h6>
           
          </div>
          <form action="{{url('/admin/add-pdf')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pdf_id" value="{{$singledata!=''?$singledata->id:''}}">
            <div class="card-body" id="demo">
              <div class="row">

                <div class="col-sm-6">
                  <label id="inputName">Doc Name</label>
                  <input type="text" name="name" value="{{(isset($singledata->name)) ?$singledata->name:''}}" >
                </div>

               
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="inputName">Select Topic</label>
                    <select id="topic" name="topic" class="form-control" required>
                      <option value="">-- Select --</option>
                      @foreach($topiclist as $key=>$val)
                      <option value="{{$val->id}}" {{ (isset($singledata->topic_id) && $singledata->topic_id==$val->id)?'selected':''}}>{{$val->subject_title}}</option>
                      @endforeach
                    </select>
                  </div>
                  @if (!empty($errors))
                  <div style="color:red">{{ $errors->first('topic') }}</div>
                  @endif
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="inputName">Upload PDF</label>
                    <input type="hidden" name="old_pdf" value="{{$singledata!=''?$singledata->course_pdf:''}}">
                    <input type="file" class="form-control" name="course_pdf">
                  </div>
                  @if (!empty($errors))
                  <div style="color:red">{{ $errors->first('course_pdf') }}</div>
                  @endif
                </div>
                <div class="col-sm-12">
                  <input type="checkbox" name="status" value="1" @if($singledata!='' ){{$singledata->status==1?'checked':''}}@endif>
                  <label id="inputName">Active/Deactive</label>
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
        @if($pdflist)
        <div class="card my-4">
          <div class="card-header"> <i class="fas fa-table mr-1"></i> Doc List </div>
          <div class="card-body">


            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Course</th>
                    <th>Topic</th>
                    <th>Doc Name</th>
                    <th>Doc</th>

                    <th width="5%">Status</th>
                    <th width="5%">Edit</th>
                    <th width="5%">Delete</th>
                  </tr>
                </thead>
                <tbody>

                  @php $i=1; @endphp
                  @foreach($pdflist as $key=>$val)
                  <tr>
                    <td>{{$i}}.</td>
                    <td>{{$val->course_name}}</td>
                    <td>{{$val->subject_title}}</td>
                    <td>{{$val->name}}</td>
                    <td>
                      <a href="{{url('/public/')}}/{{$val->course_pdf}}" target="_blank">PDF</a>
                    </td>
                    <td>
                      @if($val->status==1)
                      Active
                      @else
                      Deactive
                      @endif

                    </td>
                    <td>
                      <a href="{{url('/admin/update-pdf')}}/{{$val->id}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td><a href="{{url('/admin/delete-pdf')}}/{{$val->id}}" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></a>
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
  function CourseTopic() {
    var course_id = $('#course_id').val();

    if (course_id != '') {
      $.ajax({
        type: 'post',
        url: "{{url('/admin/get-topic-ajax')}}",
        data: {
          course_id: course_id,
          _token: "{{csrf_token()}}"
        },
        success: function(res) {
          $('#topic').empty();
          var o = new Option("--Select--", "")
          res.forEach(function(row) {
            let o = new Option(row.subject_title, row.id);
            $('#topic').append(o);
          });
        }
      });
    }
  }
</script>
@endsection