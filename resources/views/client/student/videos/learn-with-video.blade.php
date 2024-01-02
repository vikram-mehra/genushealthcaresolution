@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
<div class="col-lg-9 col-md-12">
    <div class="studentcenterpanel">
        <!-- <ul class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Video</li>
        </ul> -->
        <div class="blog-details-desc">
            <div class="article-content">
                <h3>Learn with Video</h3>
            </div>
            <hr>
            <div class="row">
                @if(! empty($courseVideos))
                @foreach($courseVideos as $videos)
                <div class="col-md-6">
                    <div class="student-video">
                        @if($videos->video_link)
                        <iframe src="{{$videos->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen  style="width:100%; height:300px;"></iframe>
                        @endif
                        @if($videos->video_vemio)
                        <iframe src="{{$videos->video_vemio}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen  style="width:100%; height:300px;"></iframe>
                        @endif
                        @if($videos->upload_video)
                        <video controls="controls" style="width:100%; height:300px;">
                            <source src="{{asset('public')}}/{{$videos->upload_video}}" type="video/mp4">
                        </video>
                        @endif
                    </div>
                    <div class="student-video-name">{{ $videos->name }}</div>
                </div>
                @endforeach
                @endif
                <!-- <div class="col-md-6">
                    <div class="student-video">
                        <iframe src="https://www.youtube.com/embed/Yyi7v56SUoQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="student-video-name">How to Start A Consulting Business</div>
                </div>
                <div class="col-md-6">
                    <div class="student-video">
                        <iframe src="https://www.youtube.com/embed/Yyi7v56SUoQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="student-video-name">How to Start A Consulting Business</div>
                </div>
                <div class="col-md-6">
                    <div class="student-video">
                        <iframe src="https://www.youtube.com/embed/Yyi7v56SUoQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="student-video-name">How to Start A Consulting Business</div>
                </div>
                <div class="col-md-6">
                    <div class="student-video">
                        <iframe src="https://www.youtube.com/embed/Yyi7v56SUoQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="student-video-name">How to Start A Consulting Business</div>
                </div>
                <div class="col-md-6">
                    <div class="student-video">
                        <iframe src="https://www.youtube.com/embed/Yyi7v56SUoQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="student-video-name">How to Start A Consulting Business</div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- End Blog Details Area -->
       
		 

			@endsection
	@section('javascript')

	@endsection