@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
        <div class="studentcenterpanel">
        	<ul class="breadcrumb float-right">
	            <li class="breadcrumb-item"><a href="#">Home</a></li>
	            <li class="breadcrumb-item"><a href="#">My Course</a></li>
	            <li class="breadcrumb-item"><a href="#">{{ $subject }}</a></li>
	            <li class="breadcrumb-item active" aria-current="page"> {{ $topic }}</li>
	        </ul>
            <div class="blog-details-desc">
                <div class="article-content">
                    <h3>Your {{ $topic }} Test Result</h3>
                </div>
                <hr>
                
                <div class="background22">
					<div class="all-test">
						<div class="row">
							<div class="col-md-3">
								<div class="all-test-result"><h6>Number of Questions : <span style="color: gray;">{{$totalQues}}</span></h6></div></div>

							<div class="col-md-3">
								<div class="all-test-result"><h6>Attempt Questions : <span style="color: orange;">{{$attemptQues}}</span></h6></div>
							</div>
							<div class="col-md-3">
								<div class="all-test-result"><h6>Correct Answer : <span style="color: #0bd50b;">{{$correctFlag}}</h6></span></div>
							</div>
	                    	<div class="col-md-3">
	                    		<a href="javascript:void(0)" class="default-btn pull-right" id="viewResult">View Answer Sheet</a>
	                    	</div>
						</div>
					</div>

                    <div class="row" id="resultContent" style="display: none;">
                    	@if(! empty($questions))
                    	@foreach($questions as $q)
                        @if(array_key_exists($q['id'], $data['given_ans']))
	                        <div class="qu-outer">
	                            <div class="row">
	                                <div class="col-md-9">
	                                    <div class="questionResult">
	                                        <p>
	                                           Q {{$loop->iteration}}. <?=str_replace(['<p>', '</p>'], '', $q['question'])?>
	                                        </p>
	                                    </div>
	                                    <div class="answer">
	                                        <p><strong style="color: #3baf38;">Given Answer :</strong>
	                                        	@php $obj = $data['given_ans'][$q['id']]; @endphp
												<strong>{{ ($data['quizType'][$q['id']]!='4')?strtoupper(str_replace('ans_', '', $obj)):$obj }}</strong>
	                                        </p>
	                                    </div>
                                       
                                        <div class="correct-answer">
                                            <p><strong>Correct Answer : {{ strtoupper(str_replace('ans_', '', $data['correct_ans'][$q['id']])) }}</strong> </p>
                                        </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div>&nbsp;</div>
	                                    <div class="pull-right">
	                                    	@if(in_array($q['id'],$correctAns))
	                                        <div class="correct">Correct</div>
	                                        @else
	                                        <div class="incorrect">Incorrect</div>
	                                        @endif
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endif
                        @endforeach
                        @endif
                        <div class="clear"></div>
                    </div>
                </div>
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