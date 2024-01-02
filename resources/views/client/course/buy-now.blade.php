@extends('client/layout/master')
@section('main-content')
	<div class="page-title-area item-bg-1">
	    <div class="container">
	        <div class="page-title-content">
	            <h2>{{ $course->course_name }}</h2>
	            <ul>
	                <li>
	                    <a href="index.html">
	                    Home 
	                    <i class="fa fa-chevron-right"></i>
	                    </a>
	                </li>
	                <li>
	                    <a href="#">Buy Courses <i class="fa fa-chevron-right"></i> </a>
	                </li>
	                <li> {{ $course->course_name }}</li>
	            </ul>
	        </div>
	    </div>
	</div>
	<section class="about-us-area ptb-100">
	    <div class="container">
	    	<div class="row align-items-center" id="paymentArea">
			    <div class="col-lg-4">
			    	Course Name: <b>{{ $course->course_name }}</b>
			    </div>
			    <div class="col-lg-2">Course Price: <b>{{ $course->course_price }}</b></div>
			    <div class="col-lg-2">CGST: <b>9%</b></div>
			    <div class="col-lg-2">SGST: <b>9%</b></div>
			    <div class="col-lg-2">
			    	@if($chkPayment->count() == 0)
			    	<form action="{{ url()->current() }}" method="POST">
			    		@csrf
			    		<input type="hidden" name="order_id" value="{{\Crypt::encryptString($orderId)}}">
			    		<input type="hidden" name="course_id" value="{{\Crypt::encryptString($course->id)}}">
			    		<input type="hidden" name="phone" value="{{ $userData->phone }}">
			    		<?php 
			    			$gstAmount = ($course->course_price*18)/100;
			    			$netPrice  = $course->course_price + $gstAmount;

			    		?>
			    		<input type="hidden" name="course_price" value="{{$netPrice}}">

			    		<!-- Rozarpay script here -->
			    		
			    		<script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_KEY') }}"
                            data-amount="{{$netPrice*100}}"
                            data-buttontext="Pay {{$netPrice}} INR"
                            data-name="Genus Healthcare"
                            data-description="Rozerpay"
                            data-image="{{ asset('client/assets/img/logo.png') }}"
                            data-prefill.name="{{$userData->name}}"
                            data-prefill.email="{{$userData->email}}"
                            data-theme.color="#34cb2a">
                        </script>
			    	</form>
			    	@else
			    	<h6 style="color:green;">Already Purchased!</h6>
			    	@endif
			    </div>
			</div>
			<div class="row align-items-center" id="paymentText" style="display:none;">
				<div class="col-lg-12 align-items-center">
			    	<h6 style="color:green;">Thank you for purchasing our course !</h6>
			    </div>
			</div>
		</div>
	</section>

@endsection
@section('javascript')
<script type="text/javascript">
	$(document).find('#paymentBtn1').click(function() {
		// $('#paymentArea').hide();
		// $('#paymentText').show();
	})

	$(document).find('.razorpay-payment-button')
	.addClass('bt btn-success').css();
</script>
@endsection