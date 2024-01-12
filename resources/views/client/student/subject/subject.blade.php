@php 
use	App\Http\Controllers\Client\Student\Subject\StudentSubjectControllers;
@endphp
@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
	    <div class="studentcenterpanel">
	        <ul class="breadcrumb float-right">
	            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
	            <li class="breadcrumb-item"><a href="#">{{ $subject }}</a></li>
	            <li class="breadcrumb-item active" aria-current="page"> {{ $topic }}</li>
	        </ul>
	        <div class="blog-details-desc">
	            <div class="article-content">
	                <h3>{{ $subject }}</h3>
	            </div>
	            <hr>
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="background22">
	                        <h1> {{ $topic }}</h1>
	                        <!-- <p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. </p>
	                        <h2>Chapter</h2>
	                        <p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per.  </p>
	                        <h2>Heading</h2>
	                        <p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. </p> -->
	                        @php echo $courseContent->course_content @endphp
	                        <div class="clear"></div>
	                    </div>
	                    <div class="pull-left" style="margin-top: 10px;"><a href="{{ url('/student/learn-with-video') }}/{{ $subject }}/{{ $topic }}" class="default-btn2"><i class="fa fa-video-camera"></i> Learn with Video</a></div>
	                    <div class="pull-right" style="margin-top: 10px;">
	                    	@if(count($testReports)>0)
	                    	<a href="javascript:void(0)" class="default-btn" id="viewResult">View Result Sheet</a> 
	                    	@endif
	                    <a href="{{ url('/student/online-test') }}/{{ $subject }}/{{ $topic }}" class="default-btn"><i class="fa fa-pencil-square-o"></i> Online Test</a>
	                </div>
	                </div>
	            </div>
	        </div>
	         <div class="row" id="resultContent" style="display: none;">
                    	
	                        <div class="qu-outer">
	                        @foreach($testReports as $val)
	                        	@php 
	                        		$correctAns = StudentSubjectControllers::CORRECTANS($val->questions_id,$val->id);
	                            @endphp
	                            <div class="row">
	                                <div class="col-md-3">
	                                    <div>&nbsp;</div>
	                                    <div class="pull-left">
	                                        <div ><h6>Total Questions : <span style="color: gray;"> {{$val->total_que}}</span></h6></div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div>&nbsp;</div>
	                                    <div class="pull-left">
	                                        <div ><h6>Attempt Questions : <span style="color: orange;"> {{$val->attempt_que}}</span></h6></div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div>&nbsp;</div>
	                                    <div class="pull-left">
	                                        <div ><h6>Correct Answer : <span style="color: #0bd50b;"> {{$correctAns}}</span></h6></div>
	                                       
	                                    </div>
	                                </div>
	                                <div class="col-md-2">
	                                    <div>&nbsp;</div>
	                                    <div class="pull-left">
	                                        {{date('d-m-Y', strtotime($val->created_at))}} 
	                                    </div>
	                                </div>
									<div class="col-md-1">
	                                    <div>&nbsp;</div>
	                                    <div class="pull-right">
	                                        <a href="{{ url('/student/report/'.$val->id) }}"> View </a>
	                                    </div>
	                                </div>
	                            </div>
	                            @endforeach
	                        </div>
                       
                        <div class="clear"></div>
                    </div>
	    </div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$("#viewResult").click(function(){
	  	$("#resultContent").toggle();
	});
</script>
@endsection