@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Candidate Status</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-cont mb-3">
                        <form action="{{ url('admin/candidate/list/filter')}}" method="get">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="mt-0"><strong>Filter Result:</strong></h5>
                                </div>
                                <div class="col-md-3">                                
                                    <label for="inputName">HR Name</label>
                                    <!-- <input type="text" name="candidate_name" class="form-control" value="{{ (isset($name)) ? $name : ''}}"> -->
                                    <select  name="hr_id" class="form-control">
                                        <option value="">Select HR...</option>
                                        @if(! empty($hrs))
                                        @foreach($hrDetails as $hr)
                                            <option value="{{$hr->id}}" {{ (isset($hr_id) && $hr_id == $hr->id) ? 'selected' : '' }}> {{$hr->name}} </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">                                
                                    <label for="inputName">From Date</label>
                                    <input type="date" name="from_date" class="form-control" value="{{ (isset($from_date)) ? $from_date : ''}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">To Date</label>
                                    <input type="date" name="to_date" class="form-control" value="{{ (isset($to_date)) ? $to_date : ''}}">
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">                                
                                    <label for="inputName">Candidate Name</label>
                                    <!-- <input type="text" name="candidate_name" class="form-control" value="{{ (isset($name)) ? $name : ''}}"> -->
                                    <select  name="candidate_id" class="form-control">
                                        <option value="">Select Name...</option>
                                        @if(! empty($candidates))
                                        @foreach($candidates as $candidate)
                                            <option value="{{$candidate->id}}" {{ (isset($candidateId) && $candidateId == $candidate->id) ? 'selected' : '' }}> {{$candidate->name}} </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Select Company Name</label>
                                    <select  name="company_id" class="form-control">
                                        <option value="">Select Name...</option>
                                        @if(! empty($companies))
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}" {{ (isset($companyId) && $companyId == $company->id) ? 'selected' : '' }}> {{$company->name}} </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Select Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select...</option>
                                        <option value="0" {{ (isset($status) && $status == 0) ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ (isset($status) && $status == 1) ? 'selected' : '' }}>Selected</option>
                                        <option value="4" {{ (isset($status) && $status == 4) ? 'selected' : '' }}>Joined</option>
                                        <option value="2" {{ (isset($status) && $status == 2) ? 'selected' : '' }}>Rejected</option>
                                        <option value="3" {{ (isset($status) && $status == 3) ? 'selected' : '' }}>Not Joined</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">&nbsp;</label>
                                    <input type="submit" value="Status" class="btn btn-primary" style="display: block;">
                                </div>
                            </div>
                        </form>
                    </div>
                        <!-- card -->
                    @if(! isset($id))
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i>All Assigned Candidate List</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0" id="myTable">

                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Assigned HR Name</th>
                                            <th>Candidate Name</th>
                                            <th>Mobile</th>
                                            <th>Company Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status HR Name</th>
                                            <th>Status</th>
                                            <th>Remark</th>
                                            <th>Joined Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(! empty($interviewDetails))
                                        @foreach($interviewDetails as $details)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $details->hrName }}</td>
                                            <td>{{ $details->name }}</td>
                                            <td>{{ $details->phone }}</td>
                                            <td>{{ $details->companyName }}</td>
                                            <td>{{ $details->date }}</td>
                                            <td>{{ $details->time }}</td>
                                            <td>
                                                @if(isset($hrs[$details->status_hr_id]))
                                                    {{ $hrs[$details->status_hr_id]['name'] }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($details->status == 0)
                                                <div  class="btn btn-rounded btn-outline-dark mr-3 ml-auto" style="background-color:orange; border-color:orange; color: white;">Pending</div>
                                                @endif
                                                @if($details->status == 1)
                                                <div  class="btn btn-rounded btn-success mr-3 ml-auto" style="background-color:green; border-color:green; color: white;">Selected</div>
                                                @endif
                                                @if($details->status == 2)
                                                <div  class="btn btn-rounded btn-outline-danger mr-3 ml-auto" style="background-color:red; border-color:red; color: white;">Rejected</div>
                                                @endif
                                                @if($details->status == 3)
                                                <div  class="btn btn-rounded mr-3 ml-auto" style="background-color:gray; border-color:gray; color: white;">Not Joined</div>
                                                @endif
                                                @if($details->status == 4)
                                                <div  class="btn btn-rounded mr-3 ml-auto" style="background-color:green; border-color:green; color: white;">Joined</div>
                                                @endif
                                                
                                            </td>
                                            <td>{{ $details->remark }}</td>
                                            <td>
                                               @if($details->status == 4 && $details->joining_date!=NULL)
                                                    {{$details->joining_date}}
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Start Staus Modal -->
                                        <div class="modal fade exampleModalStatus" id="exampleModalStatus{{ $details->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ url('/admin/candidate/interview/status') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="modal" value="1">
                                                    <input type="hidden" name="id" value="{{ $details->id }}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="remark">Status</label>
                                                                        <select name="status" class="form-control">
                                                                            <option value="0" {{ ($details->status == 0) ? 'selected' : '' }}>Pending</option>
                                                                            <option value="1" {{ ($details->status == 1) ? 'selected' : '' }}>Selected</option>
                                                                            <option value="2" {{ ($details->status == 2) ? 'selected' : '' }}>Rejected</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="remark">Remarks</label>
                                                                        <!-- <input type="text" name="remark" class="form-control" value="{{ $details->remark }}"> -->
                                                                        <textarea name="remark" class="form-control" rows="4" cols="4">{{ $details->remark }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- End Status modal -->
                                        <!-- Start Reschedule modal -->
                                        <div class="modal fade exampleModal" id="exampleModal{{ $details->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ url('/admin/candidate/assign-interview/update') }}/{{$details->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="modal" value="1">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Reschedule Interview</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="inputName">Date</label>
                                                                        <input type="date" name="date" class="form-control" value="{{ $details->date }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="inputName"> Time</label>
                                                                        <input type="time" name="time" class="form-control" value="{{ $details->time }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
<link href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('javascript')
    <script type="text/javascript" src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable( {
                paging: false,
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

<script>
    function changeStatus(id, status) {
        $.ajax({
            url: "{{ url('/admin/candidate/interview/status') }}",
            type:'POST',
            data:{
                id:id, 
                status:status, 
                _token:"{{ csrf_token() }}"
            },
            success:function(response) {
                if(response.success) {
                    alert(response.success);
                    location.reload();
                }else{
                    alert('Some error occured!');
                }
            },

            error:function(error){
              console.log(error)
            }
        });
    }
</script>
@endsection