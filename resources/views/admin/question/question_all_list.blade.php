@extends('admin/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h2 class="mt-5 mb-4">Questions </h2>
            <div class="row">
	                <div class="col-md-12">
	                		
	                		<div class="quizTab">
	                		@foreach($question as $val)
		                    <div class="background22">
		                        <div class="common_data">
		                            <span><b>Que {{ $loop->iteration }}. {!!$val->question!!} </b></span>
		                        </div>
		                        <div class="row">
		                        <div class="col-md-6">
		                        <div class="question">
		                            <span>A) </span>
		                            
		                            <span>{{$val->ans_a}}</span>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>B) </span>
		                            
		                            <span>{{$val->ans_b}}</span>
		                            <div class="clear"></div>
		                        </div>
		                        </div>

		                        <div class="col-md-6">
		                        <div class="question">
		                            <span>C) </span>
		                            
		                            <span>{{$val->ans_c}}</span>
		                            <div class="clear"></div>
		                        </div>
		                        <div class="question">
		                            <span>D) </span>
		                            
		                            <span>{{$val->ans_d}}</span>
		                            <div class="clear"></div>
		                        </div>
		                        </div>
		                        </div>

		                        
		                    </div>
		                    @endforeach
		                    </div>
	                </div>
	            </div>
        </div>
    </main>
@endsection

@section('javascript')

@endsection