@extends('client/layout/master')
@section('main-content')

		<!-- Start Page Title Area -->
		<div class="page-title-area item-bg-1">
			<div class="container">
				<div class="page-title-content">
					<h2>Student log In</h2>
					<ul>
						<li>
							<a href="{{url('/')}}">
								Home 
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
						<li>Student Forgot Password</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Sign Up Area -->
		<section class="sign-up-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="contact-form-action">
							<div class="form-heading text-center">
								<h3 class="form-title"><i class="fa fa-refresh"></i> Forgot Password</h3>
								
							</div>
							@isset($data['error'])
                                   <span  style="color:Red;font-size:Small;"> {{$data['error']}} </span>
                            @endisset
                            @isset($data['succ'])
                                   <span  style="color:green;font-size:Small;"> {{$data['succ']}} </span>
                            @endisset  
							<form action="{{url('/student/forgot-password')}}" method="post">
								<div class="row">
									@csrf
									<div class="col-12">
										<div class="form-group">
											<input class="form-control" type="text" name="email" placeholder="Enter your register email" value="{{old('email')}}">
										</div>
										@if (!empty($errors))
		                                    <p style="color:red" >{{ $errors->first('email') }}</p>
		                                @endif  
									</div>
									<div class="col-12">
										<button class="default-btn" type="submit">
											Continue
										</button>
									</div>
									<div class="col-12">
										<p class="account-desc">
											Not a member?
											<a href="{{url('/student/sign-up')}}">Register</a>
										</p>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Sign Up Area -->
	

		
	@endsection
@section('javascript')

@endsection
