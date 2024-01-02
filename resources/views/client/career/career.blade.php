
@extends('client/layout/master')
@section('main-content')

	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg-1">
	    <div class="container">
	        <div class="page-title-content">
	            <h2>Career</h2>
	            <ul>
	                <li>
	                    <a href="index.html">
	                    Home 
	                    <i class="fa fa-chevron-right"></i>
	                    </a>
	                </li>
	                <li>Career</li>
	            </ul>
	        </div>
	    </div>
	</div>
	<!-- End Page Title Area -->
	<!-- Start FAQ Area -->
	<section class="questions-area two faq-page ptb-100">
	    <div class="container">
	        <div class="row align-items-center">
	            <div class="col-lg-7 pl-0">
	                <div class="questions-bg-area">
	                    <div class="section-title">
	                        <span>Career</span>
	                        <h2>Open Positions </h2>
	                    </div>
	                    <div class="row">
	                        <div class="col-lg-12">
	                            <div class="faq-accordion">
	                                <ul class="accordion">
	                                	@if(! empty($careers))
                                        @foreach($careers as $career)
	                                    <li class="accordion-item">
	                                        <a class="accordion-title {{ ($loop->iteration == 1) ? 'active' : ''}}" href="javascript:void(0)">
	                                        <i class="fa fa-arrow-right"></i>
	                                        {{ $career->heading }}
	                                        </a>
	                                        <p class="accordion-content {{ ($loop->iteration == 1) ? 'show' : ''}}">
	                                            <strong>Experience:</strong> {{ $career->experience }}<br>
	                                            <strong>Location:</strong> {{ $career->location }}<br>
	                                            <strong>Email:</strong> 
	                                            @php
	                                            $emailArr = explode(',', $career->email);
	                                            $eStr = '';
	                                            foreach($emailArr as $email) {
	                                            	$eStr .= '<a href="mailto:'.$email.'">'.$email.'</a>,';
	                                            }
	                                            @endphp
	                                            <?=chop($eStr, ',')?><br>

	                                            @if($career->description != '')
	                                            	<?=trim(preg_replace('#^<p>|</p>$#i', '', trim($career->description)));?>
	                                            @endif
	                                        </p>
	                                    </li>
	                                    @endforeach
	                                    @endif
	                                    {{--<li class="accordion-item">
	                                        <a class="accordion-title" href="javascript:void(0)">
	                                        <i class="fa fa-arrow-right"></i>
	                                        Medical Biller/Account Receivables
	                                        </a>
	                                        <p class="accordion-content"><strong>Fresher and Experience</strong>: 500<br>
	                                            <strong>Location:</strong> Mumbai, Hyderabad, Coimbatore, Kolkata, Vizag, Mohali, Noida<br>
	                                            <strong>Email:</strong> <a href="mailto:hr@genushealthcaresolution.com">hr@genushealthcaresolution.com</a>, <a href="mailto:shivangi.yadav@genushealthcaresolution.com">shivangi.yadav@genushealthcaresolution.com</a><br>
	                                            <a href="mailto:pooja.sharma@genushealthcaresolution.com">pooja.sharma@genushealthcaresolution.com</a>
	                                        </p>
	                                    </li>
	                                    <li class="accordion-item">
	                                        <a class="accordion-title" href="javascript:void(0)">
	                                        <i class="fa fa-arrow-right"></i>
	                                        Software Engineer-
	                                        </a>
	                                        <p class="accordion-content">500+ Openings<br>
	                                            Core Java-Developer<br>
	                                            Enterprise Platform Engineering Java-Lead<br>
	                                            Angular 2-Developer<br>
	                                            Computing-Developer<br>
	                                            Computing-Lead<br>
	                                            JavaScript-Developer<br>
	                                            C# - CSharp-Programming-Lead<br>
	                                            NMS-EMS-Engineering Lead<br>
	                                            Automotive Navigation-Developer<br>
	                                            App-Cloud Services-Lead<br>
	                                            C++ Programming-Developer<br>
	                                            <strong>Location</strong>: Mumbai, Hyderabad, Coimbatore, Kolkata, Vizag, Mohali, Noida<br>
	                                            Email: <a href="mailto:amarjeet@genushealthcaresolution.com">amarjeet@genushealthcaresolution.com</a>, <a href="mailto:vikas.maheshwari@genushealthcaresoluiton.com">vikas.maheshwari@genushealthcaresoluiton.com</a>
	                                        </p>
	                                    </li>--}}
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-5 pr-0">
	                <img src="{{url('public/client')}}/assets/img/career.jpg">
	            </div>
	        </div>
	    </div>
	</section>
	<!-- End FAQ Area -->

@endsection
@section('javascript')

@endsection