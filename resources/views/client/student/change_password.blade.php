@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
	    <div class="studentcenterpanel">
	        <ul class="breadcrumb float-right">
	            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
	        </ul>
	        <div class="blog-details-desc">
	            <div class="article-content">
	                <h3>Change Password</h3>
	            </div>
	            <hr>
	            <div class="row">
	                <div class="col-xl-6">
	                    <form action="{{ url('student/change-password') }}" method="post">
	                    	<div class="password_change_form">
	                        	@csrf
	                            <div class="form-group">
	                                <label for="exampleInputPassword1">Current Password</label>
	                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*******" name="current_password" value="{{old('current_password')}}">
                                    @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('current_password') }}</div>
                                    @endif
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputPassword2">New Password</label>
	                                <input type="password" class="form-control" id="exampleInputPassword2" name="new_password" value="{{old('new_password')}}">
                                    @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('new_password') }}</div>
                                    @endif
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputPassword3">Confirm Password</label>
	                                <input type="password" class="form-control mb0" id="exampleInputPassword3" name="confirm_password" value="{{old('confirm_password')}}">
                                    @if (!empty($errors))
                                        <div style="color:red">{{ $errors->first('confirm_password') }}</div>
                                    @endif
	                            </div>
	                        
		                    </div>
	                    	<div class="pull-right" style="margin-top: 10px;">
	                    		<button type="submit" class="default-btn">Change Password</button>
	                    	</div>
                    	</form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@section('javascript')
@endsection