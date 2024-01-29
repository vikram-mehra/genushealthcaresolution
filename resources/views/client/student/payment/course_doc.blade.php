@extends('client/layout/master')
@extends('client/student/layout/sidebar')
@section('main-content')
@endsection
@section('side-bar')
	<div class="col-lg-9 col-md-12">
	    <div class="studentcenterpanel">
	        <ul class="breadcrumb float-right">
	            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Course Document List</li>
	        </ul>
	        <div class="blog-details-desc">
	            <div class="article-content">
	                <h3>Course Document List</h3>
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
	                                        <th>Assign DATE</th>
	                                        <th>Document Name</th>
											<th>Valid Till</th>
	                                        <th>view</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                	@if(! empty($doc))
	                                	@foreach($doc as $payment)
	                                    <tr>
	                                        <td>{{ $loop->iteration }}</td>
	                                        <td>{{ $payment->created_at }}</td>
	                                        <td>{{ $payment->course_pdf->name }}</td>
											<td>{{ $payment->expiry_date }}</td>
                                            <td>
												<a href="{{url('/public/')}}/{{$payment->course_pdf->course_pdf}}" target="_blank">Doc</a>
											</td>
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