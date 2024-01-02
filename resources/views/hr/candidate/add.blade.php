@extends('hr/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Add Candidate</h2>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($id))
                    <form action="{{ url('/hr/candidate/update-details') }}/{{$id}}" method="post" enctype="multipart/form-data">
                    @else 
                    <form action="{{ url('/hr/candidate/add') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Candidate Form</h6>
                            </div>
                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name<span style="color: red;">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ (isset($candidate->name)) ? $candidate->name : old('name') }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">E-mail ID<span style="color: red;">*</span></label>
                                            <input type="text" id="email" name="email" class="form-control" value="{{ (isset($candidate->email)) ? $candidate->email : old('email') }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone No<span style="color: red;">*</span></label>
                                            <input type="text" id="phone" name="phone" class="form-control" value="{{ (isset($candidate->phone)) ? $candidate->phone : old('phone') }}" required  maxlength="10">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dob">DOB<span style="color: red;">*</span></label>
                                            <input type="date" id="dob" name="dob" class="form-control" value="{{ (isset($candidate->dob)) ? $candidate->dob : old('dob') }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('dob') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="current_company">Current Company</label>
                                            <input type="text" id="current_company" name="current_company" class="form-control" value="{{ (isset($candidate->current_company)) ? $candidate->current_company : old('current_company') }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('current_company') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="current_location">Current Location<span style="color: red;">*</span></label>
                                            <input type="text" id="current_location" name="current_location" class="form-control" value="{{ (isset($candidate->current_location)) ? $candidate->current_location : old('current_location') }}" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('current_location') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="notice_period">Notice Period</label>
                                            <input type="text" id="notice_period" name="notice_period" class="form-control" value="{{ (isset($candidate->notice_period)) ? $candidate->notice_period : old('notice_period') }}">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('notice_period') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pan_no">PAN card no</label>
                                            <input type="text" id="pan_no" name="pan_no" class="form-control" value="{{ (isset($candidate->pan_no)) ? $candidate->pan_no : old('pan_no') }}" placeholder="Example: BNZAA2318J">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('pan_no') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="skill">Key Skills</label>
                                            <input type="text" id="skill" name="skill" class="form-control" value="{{ (isset($candidate->skill)) ? $candidate->skill : old('skill') }}">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('skill') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="qualification">Educational Qualification</label>
                                            <input type="text" id="qualification" name="qualification" class="form-control" value="{{ (isset($candidate->qualification)) ? $candidate->qualification : old('qualification') }}">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('qualification') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="expected_ctc">Expected CTC</label>
                                            <input type="text" id="expected_ctc" name="expected_ctc" class="form-control" value="{{ (isset($candidate->expected_ctc)) ? $candidate->expected_ctc : old('expected_ctc') }}">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('expected_ctc') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exprience">Experience</label>
                                            <input type="text" id="exprience" name="exprience" class="form-control" value="{{ (isset($candidate->exprience)) ? $candidate->exprience : old('exprience') }}">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('exprience') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="current_ctc">Current CTC</label>
                                            <input type="text" id="current_ctc" name="current_ctc" class="form-control" value="{{ (isset($candidate->current_ctc)) ? $candidate->current_ctc : old('current_ctc') }}">
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('current_ctc') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="resume">Upload (Resume)<span style="color: red;">*</span></label>
                                            <input type="file" name="resume" class="form-control"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" value="{{old('resume')}}" >
                                            <div style="color: #919191; font-size: 14px;">(pdf, doc, jpg)</div>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('resume') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            @if(! isset($id))
                                            <input type="checkbox" name="status" checked>
                                            Status (Active/Inactive)
                                            @else
                                            <input type="checkbox" name="status" {{ (isset($candidate->status) && $candidate->status == 1) ? 'checked' : old('name') }}>
                                            Status (Active/Inactive)
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="clear"></div>
                                            <input type="submit" value="{{ (isset($id)) ? 'Update' : 'Submit' }}" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-body --> 
                        </div>
                        <!-- /.card -->
                        {{--<div class="card-body" id="demo">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" value="{{ (isset($id)) ? 'Update' : 'Submit' }}" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>--}}
                    </form>
                        <!-- card -->
                    @if(! isset($id))
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> Candidate List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Entry HR Name</th>
                                            <th>Name</th>
                                            <th>E-mail ID</th>
                                            <th>Phone No.</th>
                                            <th>DOB</th>
                                            <th>Current Company</th>
                                            <th>Current Location</th>
                                            <th>Notice Period</th>
                                            <th>PAN card no</th>
                                            <th>Key Skills</th>
                                            <th>Educational Qualification</th>
                                            <th>Current CTC</th>
                                            <th>Expected CTC</th>
                                            <th>Exprience</th>
                                            <th>Upload (Resume)</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <!-- <th width="5%">Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($candidates))
                                        @php $i = ($candidates->currentpage()-1) * $candidates->perpage() + 1; @endphp
                                        @foreach($candidates as $k => $candidate)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ (isset($candidate->hr_details->name)) ? $candidate->hr_details->name : '-' }}</td>
                                            <td>{{ $candidate->name }}</td>
                                            <td>{{ $candidate->email }}</td>
                                            <td>{{ $candidate->phone }}</td>
                                            <td>{{ $candidate->dob }}</td>
                                            <td>{{ $candidate->current_company }}</td>
                                            <td>{{ $candidate->current_location }}</td>
                                            <td>{{ $candidate->notice_period }}</td>
                                            <td>{{ $candidate->pan_no }}</td>
                                            <td>{{ $candidate->skill }}</td>
                                            <td>{{ $candidate->qualification }}</td>
                                            <td>{{ $candidate->current_ctc }}</td>
                                            <td>{{ $candidate->expected_ctc }}</td>
                                            <td>{{ $candidate->exprience }}</td>
                                            <td><a href="{{url('hr/download-cv')}}?resume={{ $candidate->resume }}" >{{ $candidate->resume }}</a></td>
                                            <td>{{ ($candidate->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td><a href="{{url('/hr/candidate/edit-details')}}/{{$candidate->id}}"><i class="far fa-edit"></i></a></td>
                                            <!-- <td><a href="{{url('/hr/candidate/destroy')}}/{{$candidate->id}}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a></td> -->
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Entry HR Name</th>
                                            <th>Name</th>
                                            <th>E-mail ID</th>
                                            <th>Phone No.</th>
                                            <th>DOB</th>
                                            <th>Current Company</th>
                                            <th>Current Location</th>
                                            <th>Notice Period</th>
                                            <th>PAN card no</th>
                                            <th>Key Skills</th>
                                            <th>Educational Qualification</th>
                                            <th>Current CTC</th>
                                            <th>Expected CTC</th>
                                            <th>Exprience</th>
                                            <th>Upload (Resume)</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Edit</th>
                                            <!-- <th width="5%">Delete</th> -->
                                        </tr>
                                    </thead>
                                </table>
                                {!! $candidates->links() !!}
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
        $('#phone').keypress(function(e) {
            // VAlidate 10 digit number
            var $this = $(this);
            var regex = new RegExp("^[0-9\b]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (e.charCode < 54 && e.charCode > 47) {
                if ($this.val().length == 0) {
                    e.preventDefault();
                    return false;
                } else {
                    return true;
                }
            }
            if (regex.test(str)) {
                return true;
            }

            e.preventDefault();
            return false;
        });
    </script>
@endsection