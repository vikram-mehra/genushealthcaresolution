@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Candidates</h2>
            <div class="row">
                <div class="col-md-12">
                        <!-- card -->
                    @if(! isset($id))
                    <div class="card my-4">
                        <div class="card-header"> <i class="fas fa-table mr-1"></i> Candidate List </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0" id="myTable">
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
                                            <th>Created Date</th>
                                            <!-- <th width="5%">Edit</th> -->
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(! empty($candidates))
                                        @php $i = 1; @endphp
                                        @foreach($candidates as $candidate)
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
                                            <td>{{ $candidate->resume }}</td>
                                            <td>{{ ($candidate->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td>{{date('d-m-Y', strtotime($candidate->created_at))}}</td>
                                            <!-- <td><a href="{{url('/admin/candidate/edit-details')}}/{{$candidate->id}}"><i class="far fa-edit"></i></a></td> -->
                                            <td><a href="{{url('/admin/candidate/destroy')}}/{{$candidate->id}}" onclick="return confirm('Are you sure want to delete this record?')"><i class="far fa-trash-alt"></i></a></td>
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
                                            <!-- <th width="5%">Edit</th> -->
                                            <th width="5%">Delete</th>
                                        </tr>
                                    </thead>
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
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Candidate List'
                    },
                ]
            } );
            $(document).find('.dt-buttons button').text('Export Excel').addClass('btn btn-primary');
        } );

    </script>
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