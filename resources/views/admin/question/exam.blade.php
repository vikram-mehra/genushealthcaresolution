@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Question</h2>
            <div class="row">
                <div class="col-md-12">
                   <!--  <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title">Question Form</h6> -->
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                  <i class="fas fa-minus"></i></button>
                                </div> --> 
                        <!-- </div>
                        <div class="card-body" id="demo">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName">Select Subject</label>
                                        <select id="courseName" class="form-control" >
                                            <option value="">-- Select --</option>
                                            @if(! empty($courses))
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName">Select Quiz Name</label>
                                        <select id="quizName" class="form-control">
                                            <option value="">-- Select --</option>
                                            @if(! empty($coursetopics))
                                                @foreach($coursetopics as $val)
                                                    <option value="{{ $val->id }}">{{ $val->subject_title }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div> -->
                            <!-- </div>
                        </div> -->
                        <!-- /.card-body --> 
                    <!-- </div> -->
                    <!-- /.card -->
                    <div class="card-body" id="demo">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <a href="{{url('/admin/exam/question-list')}}" id="view_question"  class="btn btn-success float-right"  style="margin-left: 10px !important; color: white;" target="_blank">View Question</a>
                            </div>

                            <div class="form-group" >
                                <input type="submit" id="AddQuestion" value=" Add Question " class="btn btn-success float-right" onclick="getQuestionPage()">
                            </div>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> Category List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <!-- <th>Course Name</th> -->
                                            <th>Topic Name</th>
                                            <th>Answer A</th>
                                            <th>Answer B</th>
                                            <th>Answer C</th>
                                            <th>Answer D</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($questions))
                                        @foreach($questions as $question)
                                        @php $cn = $question->course; @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <!-- <td>{{ (isset($cn->course_name)) ? $cn->course_name : '' }}</td> -->
                                            <td>{{ !empty($question->course_topic)? $question->course_topic->subject_title:''}}</td>
                                            <td>{{ $question->ans_a }}</td>
                                            <td>{{ $question->ans_b }}</td>
                                            <td>{{ $question->ans_c }}</td>
                                            <td>{{ $question->ans_d }}</td>
                                            <td>Active</td>
                                            <td><a href="{{url('/admin/edit-question')}}/{{$question->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('/admin/delete-question')}}/{{$question->id}}" onclick="return confirm('Are you sure want to delete this question?')"><i class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end --> 
                </div>
            </div>
        </div>
    </main>
@endsection

@section('javascript')

<script>

    function getQuizName()
    {
        var course_id = $('#courseName').val();

        if(course_id!='') {
            $.ajax({
                type: 'post',
                url : "{{url('/admin/get-topic-ajax')}}",
                data: {
                    course_id : course_id,
                    _token    : "{{csrf_token()}}"
                },
                success:function(res){
                    $('#quizName').empty();
                    var o = new Option("--Select--", "")
                    res.forEach(function (row) {
                        let o = new Option(row.subject_title, row.id);
                        $('#quizName').append(o);
                    });
                }
            });

            // $('#AddQuestion').attr('disabled', false);
        }
    }

    function getQuestionPage()
    {
        //var course_id = $('#courseName').val();
       // var topic_id = $('#quizName').val();

       // if(topic_id) {
            window.location.href = "{{ url('/admin/add-question')}}";
        // } else {
        //     alert('Please select course and topic first!');
        // }
        
        
    }
</script>

@endsection