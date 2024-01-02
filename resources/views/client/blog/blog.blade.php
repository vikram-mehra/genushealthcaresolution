@extends('client/layout/master')
@section('main-content')

	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg-1">
	    <div class="container">
	        <div class="page-title-content">
	            <h2>Blog</h2>
	            <ul>
	                <li>
	                    <a href="index.html">
	                    Home 
	                    <i class="fa fa-chevron-right"></i>
	                    </a>
	                </li>
	                <li>Blog</li>
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
	                    <h2>Blog</h2>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	        	@if(! empty($blogs))
	        	@foreach($blogs as $blog)
	            <div class="col-lg-4 col-md-6">
	                <div class="single-blog-post">
	                    <div class="post-image">
	                        <a href="#">
	                        <img src="{{ asset('admin/images/blog/740x614')}}/{{ $blog->photo }}" alt="image">
	                        </a>
	                    </div>
	                    <div class="post-content">
	                        <div class="date">
	                            <i class="fa fa-calendar"></i> 
	                            <span>{{ $blog->date }}</span>
	                        </div>
	                        <h3>
	                            <a href="{{url('/blog-details/')}}/{{ $blog->heading }}">{{ $blog->heading }}</a>
	                        </h3>
	                        <p>{{ $blog->short_content }}</p>
	                        <a href="{{url('/blog-details/')}}/{{ $blog->heading }}" class="default-btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            @endforeach
	            @endif
	            {{--<div class="col-lg-4 col-md-6">
	                <div class="single-blog-post">
	                    <div class="post-image">
	                        <a href="#">
	                        <img src="{{url('public/client')}}/assets/img/blog1.jpg" alt="image">
	                        </a>
	                    </div>
	                    <div class="post-content">
	                        <div class="date">
	                            <i class="fa fa-calendar"></i> 
	                            <span>Oct 29, 2020</span>
	                        </div>
	                        <h3>
	                            <a href="blog-details.html">Now You Can Blog from Everywhere!</a>
	                        </h3>
	                        <p>We’ve made it quick and convenient for you to manage your blog from anywhere. In this blog post we’ll share the ways you can post to your...</p>
	                        <a href="{{url('/blog-details/')}}" class="default-btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6">
	                <div class="single-blog-post">
	                    <div class="post-image">
	                        <a href="#">
	                        <img src="{{url('public/client')}}/assets/img/blog2.jpg" alt="image">
	                        </a>
	                    </div>
	                    <div class="post-content">
	                        <div class="date">
	                            <i class="fa fa-calendar"></i> 
	                            <span>Oct 29, 2020</span>
	                        </div>
	                        <h3>
	                            <a href="blog-details.html">Design a Stunning Blog</a>
	                        </h3>
	                        <p>When it comes to design, the Wix blog has everything you need to create beautiful posts that will grab your reader's attention. Check out...</p>
	                        <a href="{{url('/blog-details/')}}" class="default-btn">Read More</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6">
	                <div class="single-blog-post">
	                    <div class="post-image">
	                        <a href="#">
	                        <img src="{{url('public/client')}}/assets/img/blog3.jpg" alt="image">
	                        </a>
	                    </div>
	                    <div class="post-content">
	                        <div class="date">
	                            <i class="fa fa-calendar"></i> 
	                            <span>Oct 29, 2020</span>
	                        </div>
	                        <h3>
	                            <a href="blog-details.html">Grow Your Blog Community</a>
	                        </h3>
	                        <p>With Wix Blog, you’re not only sharing your voice with the world, you can also grow an active online community. That’s why the Wix blog...</p>
	                        <a href="{{url('/blog-details/')}}" class="default-btn">Read More</a>
	                    </div>
	                </div>
	            </div>--}}
	        </div>
	    </div>
	</section>
	<!-- End About Us Area -->

		 

		@endsection
@section('javascript')
@endsection