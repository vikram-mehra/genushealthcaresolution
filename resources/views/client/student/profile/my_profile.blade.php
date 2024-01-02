@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
	    <div class="studentcenterpanel">
	        <ul class="breadcrumb float-right">
	            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
	            <li class="breadcrumb-item"><a href="#">Student Panel</a></li>
	            <li class="breadcrumb-item active" aria-current="page"> My Profile</li>
	        </ul>
	        <div class="blog-details-desc">
	            <div class="article-content">
	                <h3 class="float-left">My Profile</h3>
	                <div class="clear"></div>
	            </div>
	            <hr>
	            {{--<div class="row">
	                <div class="col-md-12">
	                    <div class="background22">
	                        <div class="fl-left">
	                            <div class="user-id">Name</div>
	                            <div class="colone">:</div>
	                            <div class="form-right">{{$student->name}}</div>
	                            <div class="clear"></div>
	                        </div>
	                        <div class="fl-left">
	                            <div class="user-id">Mobile No</div>
	                            <div class="colone">:</div>
	                            <div class="form-right">{{$student->phone}}</div>
	                            <div class="clear"></div>
	                        </div>
	                        <!-- <div class="fl-left">
	                            <div class="user-id">Gender</div>
	                            <div class="colone">:</div>
	                            <div class="form-right">Male</div>
	                            <div class="clear"></div>
	                        </div> -->
	                        <div class="fl-left">
	                            <div class="user-id">Email</div>
	                            <div class="colone">:</div>
	                            <div class="form-right">{{$student->email}}</div>
	                            <div class="clear"></div>
	                        </div>
	                        <!-- <div class="fl-left">
	                            <div class="user-id">City</div>
	                            <div class="colone">:</div>
	                            <div class="form-right">Delhi</div>
	                            <div class="clear"></div>
	                        </div> -->
	                        <!-- <div class="fl-left">
	                            <div class="user-id">Pincode</div>
	                            <div class="colone">:</div>
	                            <div class="form-right">201301, (U.P.)</div>
	                            <div class="clear"></div>
	                        </div> -->
	                        <!-- <div class="fl-left">
	                            <div class="user-id">Address</div>
	                            <div class="colone">:</div>
	                            <div class="form-right"> Dummy Address </div>
	                            <div class="clear"></div>
	                        </div> -->
	                        <div class="pull-right"><a href="#" class="default-btn">Edit Profile</a></div>
	                        <div class="clear"></div>
	                    </div>
	                </div>
	            </div>--}}

	            
	            <div class="row">
	                <div class="col-md-12">
	                    <form action="{{ url('student/my-profile') }}" method="post">
	                    	@csrf
	                    	<input type="hidden" name="uid" value="{{ \Crypt::encryptString($student->id) }}">
		                    <div class="background22">
		                        <div class="form-group">
		                            <div class="user-id">Email</div>
		                            <div class="colone">:</div>&nbsp;
		                            <input type="text" class="form-right" name="email" value="{{$student->email}}" readonly style="background-color: chartreuse; color: black;">
		                            <div class="clear"></div>
		                        </div>
		                        <div class="form-group">
		                            <div class="user-id">Name</div>
		                            <div class="colone">:</div>&nbsp;
		                            <input type="text" class="form-right" name="name" value="{{$student->name}}" required>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="form-group">
		                            <div class="user-id">Mobile No</div>
		                            <div class="colone">:</div>&nbsp;
		                            <input type="text" class="form-right" name="phone" value="{{$student->phone}}" required minlength="7" maxlength="10">
		                            <div class="clear"></div>
		                        </div>
		                        <div class="form-group">
			                        <div class="pull-right">
			                        	<button type="submit" class="default-btn">Edit Profile</button>
			                        </div>
			                        <div class="clear"></div>
			                    </div>
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