@extends('client/layout/master')
@section('main-content')

		<!-- Start Page Title Area -->
		<div class="page-title-area item-bg-1">
			<div class="container">
				<div class="page-title-content">
					<h2>Sign Up</h2>
					<ul>
						<li>
							<a href="{{url('/')}}">
								Home 
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
						<li>Sign Up</li>
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
								<h3 class="form-title">Create an account!</h3> 
							</div>
							<p style="color:red">{{$error!=''?$error:''}}</p>
							<form accept="{{url('/student/sign-up')}}" method="post">
								<div class="row">
								 @csrf
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Name">
										</div>
										@if (!empty($errors))
                        <div style="color:red">{{ $errors->first('name') }}</div>
                    @endif
									</div>
									 <div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Email Address">
										</div>
										@if (!empty($errors))
                        <div style="color:red">{{ $errors->first('email') }}</div>
                    @endif
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input class="form-control" type="number" name="phone" value="{{old('phone')}}" placeholder="Mobile">
										</div>
										@if (!empty($errors))
                        <div style="color:red">{{ $errors->first('phone') }}</div>
                    @endif
									</div>
									
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input class="form-control" type="password" name="password" value="{{old('password')}}" placeholder="Password">
										</div>
										@if (!empty($errors))
                        <div style="color:red">{{ $errors->first('password') }}</div>
                    @endif
									</div>
									<div class="col-md-12 col-sm-12 ">
										<div class="form-group">
											<input class="form-control" type="password" value="{{old('confirm_password')}}" name="confirm_password" placeholder="Confirm Password">
										</div>
										@if (!empty($errors))
                        <div style="color:red">{{ $errors->first('confirm_password') }}</div>
                    @endif
									</div>
									 
									<div class="col-12">
										<button class="default-btn" type="submit">
											Register Account
										</button>
									</div>
									<div class="col-12">
										<p class="account-desc">
											Already have an account?
											<a href="{{url('/student/log-in')}}"> Login</a>
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

		
		 