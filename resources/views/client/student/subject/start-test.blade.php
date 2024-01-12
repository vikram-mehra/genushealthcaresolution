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
	                <h3>Questions <span id="queIncr">1</span> of {{ $questions->count() }}</h3>
	            </div>
	            <hr>
	            <div class="row">
	                <div class="col-md-12">
	                	<form action="{{ url()->current() }}" method="POST" id="question-form">
	                		<input type="hidden" name="_token" id="formToken" value="{{ csrf_token() }}">
	                		@if(! empty($questions))
	                		<div class="quizTab">
	                		@foreach($questions as $q)
		                    <div class="background22" id="quizTab{{ $loop->iteration }}">
		                        <div class="common_data">
		                            <p><i class="fa fa-pencil-square-o"></i><?=$q->question?></p>
		                        </div>
		                        <input type="hidden" name="queId[]" value="{{$q->id}}">
								<input type="hidden" name="quizType[{{$q->id}}]" value="{{$q->quizType}}">
		                        <input type="hidden" name="correct_ans[{{$q->id}}]" value="{{\Crypt::encryptString($q->correct_ans)}}">
		                        <input type="hidden" id="total_que" name="total_que" value="{{$questions->count()}}">
		                       @if($q->quizType==1)
								<div class="question">
		                            <span>A) </span>
		                            <input type="radio" name="given_ans[{{$q->id}}]" qno="{{ $loop->iteration }}" id="ans_a{{ $loop->iteration }}" value="ans_a">
		                            <p>{{ $q->ans_a }}</p>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>B) </span>
		                            <input type="radio" name="given_ans[{{$q->id}}]" qno="{{ $loop->iteration }}" id="ans_b{{ $loop->iteration }}" value="ans_b">
		                            <p>{{ $q->ans_b }}</p>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>C) </span>
		                            <input type="radio" name="given_ans[{{$q->id}}]" qno="{{ $loop->iteration }}" id="ans_c{{ $loop->iteration }}" value="ans_c">
		                            <p>{{ $q->ans_c }}</p>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>D) </span>
		                            <input type="radio" name="given_ans[{{$q->id}}]" qno="{{ $loop->iteration }}" id="ans_d{{ $loop->iteration }}" value="ans_d">
		                            <p>{{ $q->ans_d }}</p>
		                            <div class="clear"></div>
		                        </div>
								@elseif($q->quizType==2)
								<div class="question">
		                            <span>A) </span>
		                            <input type="checkbox" name="given_ans[{{$q->id}}][]" qno="{{ $loop->iteration }}" id="ans_a{{ $loop->iteration }}" value="ans_a">
		                            <p>{{ $q->ans_a }}</p>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>B) </span>
		                            <input type="checkbox" name="given_ans[{{$q->id}}][]" qno="{{ $loop->iteration }}" id="ans_b{{ $loop->iteration }}" value="ans_b">
		                            <p>{{ $q->ans_b }}</p>
		                            <div class="clear"></div>
		                        </div>
								<div class="question">
		                            <span>C) </span>
		                            <input type="checkbox" name="given_ans[{{$q->id}}][]" qno="{{ $loop->iteration }}" id="ans_c{{ $loop->iteration }}" value="ans_c">
		                            <p>{{ $q->ans_c }}</p>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>D) </span>
		                            <input type="checkbox" name="given_ans[{{$q->id}}][]" qno="{{ $loop->iteration }}" id="ans_d{{ $loop->iteration }}" value="ans_d">
		                            <p>{{ $q->ans_d }}</p>
		                            <div class="clear"></div>
		                        </div>
								@elseif($q->quizType==3)
								<div class="question">
		                            <span>A) </span>
		                            <input type="radio" name="given_ans[{{$q->id}}]" qno="{{ $loop->iteration }}" id="ans_a{{ $loop->iteration }}" value="ans_a">
		                            <p>{{ $q->ans_a }}</p>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>B) </span>
		                            <input type="radio" name="given_ans[{{$q->id}}]" qno="{{ $loop->iteration }}" id="ans_b{{ $loop->iteration }}" value="ans_b">
		                            <p>{{ $q->ans_b }}</p>
		                            <div class="clear"></div>
		                        </div>
								@elseif($q->quizType==4)
								<div class="question">
		                            <textarea id="ans" name="given_ans[{{$q->id}}]"> </textarea>
		                            <div class="clear"></div>
		                        </div>
		                       
								@endif
		                        <span id="quizError{{$loop->iteration}}" style="color:red; display: none;">Please choose one option!</span><br>
								<span id="quizErrorTxt{{$loop->iteration}}" style="color:red; display: none;">Please write some text in textbox</span><br>
		                        <a href="javascript:void(0);" class="nextBtn" id="prevBtn{{$loop->iteration}}" onclick='prevQuiz("{{$loop->iteration}}")' style="display: none">
		                            <div class="default-btn mgtop padding22" class="nextQuiz" > Previous</div>
		                        </a>
		                        <a href="javascript:void(0);" class="nextBtn" id="nextBtn{{$loop->iteration}}" onclick='nextQuiz("{{$loop->iteration}}", "{{$q->quizType}}")'>
		                            <div class="default-btn mgtop padding22" class="nextQuiz"> Next</div>
		                        </a>
		                        <div class="clear"></div>
		                        <button type="submit" id="submitBtn{{ $loop->iteration }}" class="default-btn2 mgtop padding22">
		                             End Test
		                        </button>
		                        <div class="clear"></div>
		                    </div>
		                    @endforeach
		                    </div>
		                    @endif
		                </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@section('javascript')

	<script type="text/javascript">
		$(document).ready(function() {});

		// Displayine next question here...
		var divs = $('.quizTab>div');
		// $('#total_que').val(divs.length);
	    var now = 0;
	    divs.hide().first().show()

		function nextQuiz(id, type) {
			$('#formToken').val("{{ csrf_token() }}");
			if(type!=4) {
				if($('#quizTab'+id+' .question input').is(":checked")) {
					$('#prevBtn'+(parseInt(id)+1)).css('display', 'inline-block');
					var totalQue = parseInt($('#total_que').val());
					$('#quizError'+id+' span').hide();
					if (parseInt(id) == (totalQue-1)) {
						$('#nextBtn'+(parseInt(id)+1)).css('display', 'none');
						$('#submitBtn'+(parseInt(id)+1)).text('Submit Test');
					}
					
					divs.eq(now).hide();
					var len = divs.length;
					now = (now + 1 < len) ? now + 1 : 0;
					divs.eq(now).show();
					
					$('#queIncr').text(parseInt(now)+1);

					// Check quiz type and update form validation
				} else {
					// alert('Please choose one option!');
					$('#quizError'+id).show();
				}
			} else {
				var textareaValue = $('#quizTab' + id + ' .question textarea').val().trim();
				if (textareaValue !== "") {
					$('#prevBtn' + (parseInt(id) + 1)).css('display', 'inline-block');
					var totalQue = parseInt($('#total_que').val());
					$('#quizError' + id + ' span').hide();
					if (parseInt(id) == (totalQue - 1)) {
						$('#nextBtn' + (parseInt(id) + 1)).css('display', 'none');
						$('#submitBtn' + (parseInt(id) + 1)).text('Submit Test');
					}

					divs.eq(now).hide();
					var len = divs.length;
					now = (now + 1 < len) ? now + 1 : 0;
					divs.eq(now).show();

					$('#queIncr').text(parseInt(now) + 1);
				} else {
					// alert('Please provide an answer!');
					$('#quizErrorTxt' + id).show();
				}
			}
		}


	//prev btn

		function prevQuiz(id){
			divs.eq(now).hide();
	        var len = divs.length;
	        now = now-1;
	        divs.eq(now).show();
	        $('#queIncr').text(parseInt(now)+1);

		}
	</script>
@endsection