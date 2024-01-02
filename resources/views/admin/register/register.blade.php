@extends('admin/layout/master')
@section('main-contant')
@php
  use Illuminate\Support\Facades\Crypt;
@endphp

    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4"> Register</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title"> Register Form</h6>
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#demo">
                                  <i class="fas fa-minus"></i></button>
                                </div> --> 
                        </div>
                        <div class="card-body" id="demo">
                            <form action="{{url('/admin/register/register')}}" method="post">
                                <div class="row">
                                    <input type="hidden"  name="register_id" value="{{$singledata!=''?$singledata->id:''}}">
                                    @csrf
                                    <div class="col-sm-6">
                                        <p style="color:red">{{$error!=''?$error:''}}</p>
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" name="name" value="{{$singledata!=''?$singledata->name:old('name')}}" class="form-control">
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        @if(isset($adminAssign))
                                        <div class="form-group">
                                            @php $courseIds = []; @endphp
                                            @if($courses->count())
                                                @foreach($courses as $data)
                                                @php $courseIds[] = $data->course_id; @endphp
                                                @endforeach
                                            @endif

                                            {{--<label for="assignedCourse">Assigned Courses</label>
                                            <input id="assignedCourse" type="text" value="{{$str}}" class="form-control" readonly>--}}
                                            
                                            <input type="hidden" name="order_id" value="{{\Crypt::encryptString($order_id)}}">
                                            <label for="assigneCourse">Assigne Courses</label>
                                            <select id="assigneCourse" class="form-control select2" name="course_id[]" multiple>
                                                <option value="">-- Select Course--</option>
                                                @foreach($courseArr as $key => $val)
                                                    <option value="{{$val->id}}" {{ (in_array($val->id, $courseIds)) ? 'selected' : '' }}>{{$val->course_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">E-mail ID</label>
                                            <input type="text" name="email" value="{{$singledata!=''?$singledata->email:old('email')}}" class="form-control">
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Phone No.</label>
                                            <input type="number" name="phone" value="{{$singledata!=''?$singledata->phone:old('phone')}}" class="form-control">
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Password</label>
                                            <input type="password" name="password" value="{{$singledata!=''?Crypt::decryptString($singledata->password):old('password')}}"  class="form-control" id="password"> <span style="float:right;" onclick="PasswordShow()"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Confirm Password</label>
                                            <input type="password" name="confirm_password" value="{{$singledata!=''?Crypt::decryptString($singledata->password):old('confirm_password')}}" class="form-control">
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('confirm_password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Active/Deactive</label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ (isset($singledata->status) && $singledata->status == 1) ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ (isset($singledata->status) && $singledata->status == 0) ? 'selected' : '' }}>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="clear"></div>
                                            <input type="submit" value="Submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body --> 
                    </div>
                    <!-- /.card --> 
                    <!-- end --> 
                </div>
            </div>
        </div>
    </main>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#assigneCourse').select2();
        })
        function PasswordShow() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        } 
    </script>
@endsection
    