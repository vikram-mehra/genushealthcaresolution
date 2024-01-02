@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
        <div class="studentcenterpanel">
            <ul class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Dashboard</li>
            </ul>
            <div class="blog-details-desc">
                <div class="article-content">
                    <h3>Welcome to  Dashboard</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="ff_one ff2">
                            <div class="icon2"><i class="fa fa-book"></i> {{$courses}}
                            </div>
                            <div class="detais">
                                <p>Total Purchase Course</p>
                                <!--  <div class="timer">10</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="ff_one ff2 style4">
                            <div class="icon3"><i class="fa fa-inr"></i> {{$payment}}/-
                            </div>
                            <div class="detais">
                                <p>Total Paid Amount</p>
                                <!-- <div class="timer">100</div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')

@endsection
			
		 

		 
