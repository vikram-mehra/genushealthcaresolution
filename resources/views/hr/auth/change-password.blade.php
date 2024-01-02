@extends('hr/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Change Password</h2>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('/hr/change-password') }}" method="post">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Change Password Form</h6>
                            </div>
                            <div class="card-body" id="demo">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="text" id="current_password" name="current_password" class="form-control" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('current_password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="text" id="new_password" name="new_password" class="form-control" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('new_password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="text" id="confirm_password" name="confirm_password" class="form-control" required>
                                        </div>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('confirm_password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="clear"></div>
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-body --> 
                        </div>
                        <!-- /.card -->
                    </form>
                        <!-- card -->
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