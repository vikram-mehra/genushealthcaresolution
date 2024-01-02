@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
	    <div class="studentcenterpanel">
	        <ul class="breadcrumb float-right">
	            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
	            <li class="breadcrumb-item active" aria-current="page"> Payment History</li>
	        </ul>
	        <div class="blog-details-desc">
	            <div class="article-content">
	                <h3>Payment History</h3>
	            </div>
	            <hr>
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="background22">
	                        <div class="booking-table">
	                            <table>
	                                <thead>
	                                    <tr>
	                                        <th>S.NO.</th>
	                                        <th>DATE</th>
	                                        <th>ORDER ID</th>
	                                        <th>Course Name</th>
	                                        <th>MOBILE</th>
	                                        <th>Amount</th>
	                                        <th>PAYMENT MODE</th>
	                                        <th>PAYMENT STATUS</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                	@if(! empty($payments))
	                                	@foreach($payments as $payment)
	                                    <tr>
	                                        <td>{{ $loop->iteration }}</td>
	                                        <td>{{ $payment->date }}</td>
	                                        <td>
	                                        	@if($payment->payment_status=='authorized')
	                                        	<a href="{{url('/student/invoice')}}/{{base64_encode($payment->id)}}" target="_blank">{{$payment->order_id}}</a>
	                                        	@else
	                                        		{{$payment->order_id}}
	                                        	@endif
	                                        </td>
	                                        <td>{{ $payment->course_name }}</td>
	                                        <td>{{ $payment->phone }}</td>
	                                        <td>{{ $payment->amount }}/-</td>
	                                        <td>{{ $payment->payment_mode }}</td>
	                                        <td>
	                                        	@if($payment->payment_status=='authorized')
	                                        		Success
	                                        	@elseif($payment->payment_status=='failed')
	                                        		failed
	                                        	@endif
	                                        </td>
	                                        <!-- <td><span class="brd-rd3 wapproved">Waiting for Approval</span></td> -->
	                                    </tr>
	                                    <tr>
	                                    </tr>
	                                    @endforeach
	                                    @endif
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@section('javascript')
@endsection