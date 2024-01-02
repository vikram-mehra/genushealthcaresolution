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
						<li>Student log In</li>
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
								<h3 class="form-title"><i class="fa fa-sign-in"></i> Login</h3>
								
							</div>
							@isset($data['error'])
                                   <span  style="color:Red;font-size:Small;"> {{$data['error']}} </span>
                            @endisset  
							<form action="{{url('/student/log-in')}}" method="post">
								<div class="row">
									@csrf
									<div class="col-12">
										<div class="form-group">
											<input class="form-control" type="text" name="email" placeholder="Username or Email" value="{{old('email')}}">
										</div>
										@if (!empty($errors))
		                                    <p style="color:red" >{{ $errors->first('email') }}</p>
		                                @endif  
									</div>
									<div class="col-12">
										<div class="form-group">
											<input class="form-control" type="password" name="password" value="{{old('password')}}" placeholder="Password">
										</div>
										@if (!empty($errors))
		                                    <p style="color:red" >{{ $errors->first('password') }}</p>
		                                @endif  
									</div>
									<div class="col-lg-6 col-md-6 form-condition">
										<div class="agree-label">
											<input type="checkbox" id="chb1">
											<label for="chb1">
												Remember Me
											</label>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<a class="forget" href="{{url('student/forgot-password')}}">Forgot my password?</a>
									</div>
									<div class="col-12">
										<button class="default-btn" type="submit">
											Log In
										</button>
									</div>
									<div class="col-12">
										<p class="account-desc">
											Not a member?
											<a href="{{url('/student/sign-up')}}">Register</a>
										</p>
									</div>

 
<!--
                                    <div class="col-lg-4 col-md-4 col-sm-12">
										<button class="default-btn" type="submit">
											<i class="fa fa-google"></i> Google
										</button>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<button class="default-btn" type="submit">
											<i class="fa fa-facebook"></i>Facebook
										</button>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<button class="default-btn" type="submit">
											<i class="fa fa-twitter"></i>Twitter
										</button>
									</div>

-->
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
