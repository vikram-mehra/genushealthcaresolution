@extends('client/layout/master')
@section('main-content')
<?php
  $courseName = isset($course->course_name)?$course->course_name:'';
  $coursePrice = isset($course->course_price)?$course->course_price:'';
?>
	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg-1">
	    <div class="container">
	        <div class="page-title-content">
	            <h2>{{ $courseName}}</h2>
	            <ul>
	                <li>
	                    <a href="index.html">
	                    Home 
	                    <i class="fa fa-chevron-right"></i>
	                    </a>
	                </li>
	                <li>
	                    <a href="#">Courses <i class="fa fa-chevron-right"></i> </a>
	                </li>
	                <li> {{ $courseName}}</li>
	            </ul>
	        </div>
	    </div>
	</div>
	<!-- End Page Title Area -->
	<!-- Start About Us Area -->
	<section class="about-us-area ptb-100">
	    <div class="container">
	    <div class="row">
	        <div class="col-lg-9">
	            <div class="about-title">
	                <span>About</span>
	                <h2>{{ $courseName}}</h2>
	            </div>
	        </div>
	        <div class="col-lg-3">
	            <div style="float: right;">
	                <div class="price"><i class="fa fa-inr"></i>{{ $coursePrice}}/-</div>
	                <a class="default-btn" href="{{url('course/buy-now/')}}/{{ $courseName}}">Buy Now</a> 
	            </div>
	        </div>
	        <div class="clear"> </div>
	        @if(! empty($course->course_topic))
	        @foreach($course->course_topic as $topic)
	        <div class="col-md-6">
	            <div class="sub-box1">
	                <div class="divTableRow">
	                    <div class="divTableCell1">{{ $topic->subject_title }} </div>
	                    <div class="divTableCell2">&nbsp;</div>
	                    <div class="divTableCell3">
	                        <div class="list-group-item bgn">
	                            <p><?=$topic->course_content?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        @endforeach
	        @endif
	        {{--<div class="col-md-6">
	            <div class="sub-box1">
	                <div class="divTableRow">
	                    <div class="divTableCell1">Calculus and analysis</div>
	                    <div class="divTableCell2">&nbsp;</div>
	                    <div class="divTableCell3">
	                        <div class="list-group-item bgn">
	                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-6">
	            <div class="sub-box1">
	                <div class="divTableRow">
	                    <div class="divTableCell1">Geometry and topology</div>
	                    <div class="divTableCell2">&nbsp;</div>
	                    <div class="divTableCell3">
	                        <div class="list-group-item bgn">
	                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-6">
	            <div class="sub-box1">
	                <div class="divTableRow">
	                    <div class="divTableCell1">Combinatorics</div>
	                    <div class="divTableCell2">&nbsp;</div>
	                    <div class="divTableCell3">
	                        <div class="list-group-item bgn">
	                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-6">
	            <div class="sub-box1">
	                <div class="divTableRow">
	                    <div class="divTableCell1">Logic</div>
	                    <div class="divTableCell2">&nbsp;</div>
	                    <div class="divTableCell3">
	                        <div class="list-group-item bgn">
	                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-6">
	            <div class="sub-box1">
	                <div class="divTableRow">
	                    <div class="divTableCell1">Number Theory</div>
	                    <div class="divTableCell2">&nbsp;</div>
	                    <div class="divTableCell3">
	                        <div class="list-group-item bgn">
	                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>--}}
	        <div class="col-lg-9"></div>
	        <div class="col-lg-3">
	            <div style="float: right;">
	                <div class="price"><i class="fa fa-inr"></i>{{ $coursePrice}}/-</div>
	                <a class="default-btn" href="{{url('course/buy-now/')}}/{{ $courseName}}">Buy Now</a> 
	            </div>
	        </div>
	    </div>
	</section>
		@endsection
@section('javascript')

@endsection