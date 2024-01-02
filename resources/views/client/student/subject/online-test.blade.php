@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
	    <div class="studentcenterpanel">
	        <ul class="breadcrumb float-right">
	            <li class="breadcrumb-item"><a href="#">Home</a></li>
	            <li class="breadcrumb-item"><a href="#">{{ $subject }}</a></li>
	            <li class="breadcrumb-item active" aria-current="page"> {{ $topic }}</li>
	        </ul>
	        <div class="blog-details-desc">
	            <div class="article-content">
	                <h3>Online Test</h3>
	            </div>
	            <hr>
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="background22">
	                        <!-- <div class="fl-left">
	                            <div class="user-id">Dimentions</div>
	                            <div class="colone">:</div>
	                            <div class="form-right">Adaptabillty <br>
	                                Achievment
	                            </div>
	                            <div class="clear"></div>
	                        </div> -->
	                        <div class="fl-left">
	                            <div class="user-id">Total Questions </div>
	                            <div class="colone">:</div>
	                            <div class="form-right">{{ $totalQuestions->count() }}</div>
	                            <div class="clear"></div>
	                        </div>
	                        <!-- <div class="fl-left">
	                            <div class="user-id">Time Limit</div>
	                            <div class="colone">:</div>
	                            <div class="form-right"> 2hour</div>
	                            <div class="clear"></div>
	                        </div> -->
	                        <div class="fl-left">
	                            <div class="user-id" style="width: width: 15% !important;">Instructions</div>
	                            <div class="colone"  style="width: width: 1% !important;">:</div>
	                            <div class="form-right" style="width: width: 82% !important;">
	                                <ul>
	                                    <li><i class="fa fa-angle-right"></i> Please give your first and Immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Use CPT/ICD-10 CM/HCPCS books to search the codes, DO NOT use online search engines such as Google.</li>
	                                    <li><i class="fa fa-angle-right"></i> Total duration of the exam is 4hrs.</li>
	                                    <li><i class="fa fa-angle-right"></i> Please share your Score to email ID- shobhit.malik@genushealthcaresolution.com</li>
	                                    <!-- <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li>
	                                    <li><i class="fa fa-angle-right"></i> Give your first and immediate response to every question.</li> -->
	                                </ul>
	                            </div>
	                            <div class="clear"></div>
	                        </div>
                            <div class="pull-right" style="margin-top: 10px;">
                            	@if($totalQuestions->count())
                        			<a href="{{ url('/student/start-test') }}/{{ $subject }}/{{ $topic }}" class="default-btn"><i class="fa fa-pencil-square-o"></i> Start Test</a>
                        		@else
                        			<a href="javascript:void(0)" id="startTestChk" class="default-btn"><i class="fa fa-pencil-square-o"></i> Start Test</a>
                        		@endif
                        	</div>
	                        <div class="clear"></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@section('javascript')
<script>
	$(document).ready(function() {
		$('#startTestChk').on('click', function() {
			toastr.error("Sorry! Questions is not added for this subject.");
		})
	})
</script>
@endsection