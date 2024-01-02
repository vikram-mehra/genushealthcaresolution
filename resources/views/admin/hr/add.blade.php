@extends('admin/layout/master')
@section('main-contant')
@php
use Illuminate\Support\Facades\Crypt;
@endphp
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Hr Registeration</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title">Hr Registeration Form</h6>
                        </div>
                        <div class="card-body" id="demo">
                                @if(isset($id))
                                <form action="{{ url('/admin/hr/update') }}/{{$id}}" method="post">
                                @else 
                                <form action="{{url('/admin/hr/save')}}" method="post">
                                @endif
                                <div class="row">
                                    <input type="hidden"  name="id" value="{{ (isset($hrDetails->id)) ? $hrDetails->id : '' }}">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" value="{{ (isset($hrDetails->name)) ? $hrDetails->name : '' }}" class="form-control" required>
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">E-mail ID</label>
                                            <input type="text" name="email" value="{{ (isset($hrDetails->email)) ? $hrDetails->email : '' }}" class="form-control" required>
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone No.</label>
                                            <input type="number" id="phone" name="phone" value="{{ (isset($hrDetails->phone)) ? $hrDetails->phone : '' }}" class="form-control" required>
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" value="{{ (isset($hrDetails->password)) ? \Crypt::decryptString($hrDetails->password) : '' }}"  class="form-control" required> <span style="float:right;" onclick="PasswordShow()"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Confirm Password</label>
                                            <input type="password" name="confirm_password" value="{{ (isset($hrDetails->password)) ? \Crypt::decryptString($hrDetails->password) : '' }}" class="form-control">
                                        </div>
                                        @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('confirm_password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="clear"></div>
                                            <input type="submit" value="{{ (isset($id)) ? 'Update' : 'Submit' }}" class="btn btn-success">
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