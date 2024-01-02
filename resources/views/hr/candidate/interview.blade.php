@extends('hr/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Assign Candidate Interview</h2>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($id))
                    <form action="{{ url('/hr/candidate/assign-interview/update') }}/{{$id}}" method="post" enctype="multipart/form-data">
                    @else 
                    <form action="{{ url('/hr/candidate/assign-interview') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Candidate Interview Form</h6>
                            </div>
                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="candidate_id">Select Candidate Name</label>
                                            <select id="candidate_id" name="candidate_id" class="form-control" required>
                                                <option disabled selected>Select Name...</option>
                                                @if(! empty($candidates))
                                                @foreach($candidates as $candidate)
                                                    <option value="{{$candidate->id}}" {{ (isset($interviewDetail->candidate->id) && $interviewDetail->candidate->id == $candidate->id) ? 'selected' : '' }}> {{$candidate->name}} ({{$candidate->email}}) </option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('candidate_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company_id">Company Name</label>
                                            <select id="company_id" name="company_id" class="form-control" required>
                                                <option disabled selected>Select Name...</option>
                                                @if(! empty($companies))
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}" {{ (isset($interviewDetail->company->id) && $interviewDetail->company->id == $company->id) ? 'selected' : '' }}> {{$company->name}} </option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('company_id') }}</div>
                                        @endif

                                        <!-- <input type="text" id="company" class="form-control" placeholder="Add Company">
                                        <div style="margin-top: 10px;"><a href="#" id="addCompany" onclick="addCompany()"> <span class="add">+</span> Add New Company</a></div> -->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" id="date" name="date" class="form-control" value="{{ (isset($interviewDetail->date)) ? $interviewDetail->date : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('date') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="time">Time</label>
                                            <input type="time" id="time" name="time" class="form-control" value="{{ (isset($interviewDetail->time)) ? $interviewDetail->time : '' }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('time') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="clear"></div>
                                            <input type="submit" value="{{ (isset($id)) ? 'Update' : 'Submit' }}" class="btn btn-primary">
                                        </div>
                                    </div>
                                    <div class="col-sm-12"></div>
                                    {{--<div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="status" {{ (isset($training->status) && $training->status == 1) ? 'checked' : '' }}>
                                            Status (Active/Inactive) 
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        <!-- /.card-body --> 
                        </div>
                        <!-- /.card -->
                    </form>
                        <!-- card -->
                    @if(! isset($id))
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i>Assigned Candidate List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Assigned HR Name</th>
                                            <th>Candidate Name</th>
                                            <th>Company Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <!-- <th width="5%">Status</th> -->
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;@endphp
                                        @if(! empty($interviewDetails))
                                        @foreach($interviewDetails as $details)
                                        @if(! empty($details->candidate))
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ (isset($details->hr_details->name)) ? $details->hr_details->name : '' }}</td>
                                            <td>{{ (isset($details->candidate->name)) ? $details->candidate->name : '' }}</td>
                                            <td>{{ (isset($details->company->name))?$details->company->name:'' }}</td>
                                            <td>{{ $details->date }}</td>
                                            <td>{{ $details->time }}</td>
                                            <!-- <td>{{ ($details->status == 1) ? 'Active' : 'In Active' }}</td> -->
                                            <td><a href="{{url('/hr/candidate/assign-interview/edit')}}/{{$details->id}}"><i class="far fa-edit"></i></a></td>
                                            <td><a href="{{url('/hr/candidate/assign-interview/delete')}}/{{$details->id}}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                        @php $i++;@endphp
                                        @endif
                                        @endforeach
                                        @endif
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

        function addCompany() {
            var company = $("#company").val();

            if (company!='') {
                var exists = false; 

                $('#company_id  option').each(function() {
                    if (this.text.toLowerCase() == company.toLowerCase()) {
                        exists = true;
                    }
                });

                if(exists) {
                    $("#company").addClass('is-invalid');
                    alert('Company name should be unique!');
                }

                $.ajax({
                    url: "{{ url('/hr/company/add') }}",
                    type:'POST',
                    data:{
                        name:company, 
                        _token:"{{ csrf_token() }}"
                    },
                    success:function(response){
                        $("#company").removeClass('is-invalid').val('');
                        if(response != ''){
                            $('#company_id').append('<option value="'+response.id+'">'+response.name+'</option>')
                        }else{
                            alert("Error")
                        }
                    },

                    error:function(error){
                      console.log(error)
                    }
                });
            } else {
                alert('Company field is required!');
                $("#company").addClass('is-invalid');
                return false;
            }
        }
    </script>
@endsection