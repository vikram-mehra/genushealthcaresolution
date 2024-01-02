@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Payment History</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title">History Form</h6>
                        </div>
                        <div class="card-body" id="demo">
                            <form action="{{ url('admin/payment-history/filter')}}" method="get">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="from">From</label>
                                            <input type="date" name="from" class="form-control" placeholder="2022-01-01" value="{{$from}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="to">To</label>
                                            <input type="date" name="to" class="form-control" placeholder="2022-01-02" value="{{$to}}" required> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="submit" value="Search" class="btn btn-success float-right">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body --> 
                    </div>
                    <!-- /.card -->
                    <!-- card -->
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> Payment History List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Date</th>
                                            <th>Student Name</th>
                                            <th>Order ID</th>
                                            <th>Course Name</th>
                                            <th>Mobile No</th>
                                            <th>Amount</th>
                                            <th>Payment Mode</th>
                                            <th width="5%">Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($payments))
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $payment->date }}</td>
                                            <td>{{ $payment->student->name }} </td>
                                            <td>
                                                @if($payment->payment_status=='authorized')
                                                <a href="{{url('/admin/invoice')}}/{{base64_encode($payment->id)}}" target="_blank">{{$payment->order_id}}
                                                </a>
                                                @else
                                                {{$payment->order_id}}
                                                @endif
                                                 </td>
                                            <td>{{ isset($payment->course->course_name)!=''?$payment->course->course_name:'' }} </td>
                                            <td>{{ $payment->phone }} </td>
                                            <td>{{ $payment->amount }}/-</td>
                                            <td> {{ $payment->payment_mode }} </td>
                                                @if($payment->payment_status=='authorized')
                                                   <td style="color:#b1c900; font-weight: bold;">Success</td>
                                                @elseif($payment->payment_status=='failed')
                                                    <td style="color:red; font-weight: bold;">Faild</td>
                                                @else
                                                <td></td>
                                                @endif
                                            
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
        var course_id = $('#courseName').val();
        var topic_id = $('#quizName').val();

        if(course_id && topic_id) {
            window.location.href = "{{ url('/admin/add-question')}}/"+course_id+'/'+topic_id;
        } else {
            alert('Please select course and topic first!');
        }
        
        
    }
</script>

@endsection