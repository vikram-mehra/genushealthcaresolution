@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Question</h2>
            <div class="row">
                <div class="col-md-12">
                   
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
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> Question List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Topic Name</th>
                                            <th>Quetion</th>
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
                                        @php $i=(isset($_GET['page']) && $_GET['page']!=1)?($_GET['page']-1)*50 +1:1; @endphp
                                        @foreach($questions as $question)
                                        @php $cn = $question->course; @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ !empty($question->course_topic)? $question->course_topic->subject_title:''}}</td>
                                            <td width="50">{{ !empty($question->question)? strip_tags($question->question):''}}</td>
                                            <td>{{ $question->ans_a }}</td>
                                            <td>{{ $question->ans_b }}</td>
                                            <td>{{ $question->ans_c }}</td>
                                            <td>{{ $question->ans_d }}</td>
                                            <td>Active</td>
                                            <td><a href="{{url('/admin/edit-question')}}/{{$question->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('/admin/delete-question')}}/{{$question->id}}" onclick="return confirm('Are you sure want to delete this question?')"><i class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                        @php $i=$i+1; @endphp
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

<script type="text/javascript" src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable( {
                paging: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Interview Assigned Candidate List'
                    },
                ]
            } );
            $(document).find('.dt-buttons button').text('Export Excel').addClass('btn btn-primary');
        } );
    </script>

@endsection