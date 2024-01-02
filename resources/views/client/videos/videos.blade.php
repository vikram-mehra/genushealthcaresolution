@extends('client/layout/master')
@section('main-content')

	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg-1">
	    <div class="container">
	        <div class="page-title-content">
	            <h2>Videos</h2>
	            <ul>
	                <li>
	                    <a href="index.html">
	                    Home 
	                    <i class="fa fa-chevron-right"></i>
	                    </a>
	                </li>
	                <li>Videos</li>
	            </ul>
	        </div>
	    </div>
	</div>
	<!-- End Page Title Area -->
	<!-- Start About Us Area -->
	<section class="about-us-area ptb-100">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="about-title">
	                    <span>About</span>
	                    <h2>Videos</h2>
	                </div>
	            </div>
	        </div>
	        <div class="row align-items-center">
	        	@if(! empty($videos))
	        	@foreach($videos as $video)
	            <div class="col-md-4">
	                <div class="video">
	                    <iframe src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                </div>
	                <div class="video-name">{{ $video->name }}</div>
	            </div>

	            @endforeach
	            @endif
	            <!-- <div class="col-md-4">
	                <div class="video">
	                    <iframe src="https://www.youtube.com/embed/qlXKdUV_eRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                </div>
	                <div class="video-name">How to Start A Consulting Business</div>
	            </div>
	            <div class="col-md-4">
	                <div class="video">
	                    <iframe src="https://www.youtube.com/embed/qlXKdUV_eRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                </div>
	                <div class="video-name">How to Start A Consulting Business</div>
	            </div>
	            <div class="col-md-4">
	                <div class="video">
	                    <iframe src="https://www.youtube.com/embed/qlXKdUV_eRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                </div>
	                <div class="video-name">How to Start A Consulting Business</div>
	            </div>
	            <div class="col-md-4">
	                <div class="video">
	                    <iframe src="https://www.youtube.com/embed/qlXKdUV_eRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                </div>
	                <div class="video-name">How to Start A Consulting Business</div>
	            </div>
	            <div class="col-md-4">
	                <div class="video">
	                    <iframe src="https://www.youtube.com/embed/qlXKdUV_eRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                </div>
	                <div class="video-name">How to Start A Consulting Business</div>
	            </div> -->
	        </div>
	    </div>
	</section>
	<!-- End About Us Area -->

	@endsection
@section('javascript')

@endsection
