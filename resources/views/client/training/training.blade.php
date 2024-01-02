
@extends('client/layout/master')
@section('main-content')

		<!-- Start Page Title Area -->
		<div class="page-title-area item-bg-1">
			<div class="container">
				<div class="page-title-content">
					<h2>{{ $training->heading }}</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
						<li><a href="#">Training <i class="fa fa-chevron-right"></i></a></li>
						<li>{{ $training->heading }}</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start About Us Area -->
		<section class="about-us-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="about-title">
							<span>Training</span>
							<h2>{{ $training->heading }}</h2>
						  </div>
					</div>
  
				</div>



<div class="row align-items-center">
									<div class="col-lg-4">
										<div class="best-service-img">
											<img src="{{ asset('admin/images/training/400x400')}}/{{ $training->photo }}" alt="Service">
										</div>
									</div>

									<div class="col-lg-8">
										<div class="best-service-area">
											<?=$training->content?>
											<!-- <h3>Claims Adjudication</h3>
											<p>Coming Soon</p>
 

  

<ul class="mb-0">
<li><i class="flaticon-right-arrow"></i> SME Finance Investment Service.</li>

<li><i class="flaticon-right-arrow"></i> SME Finance Advisory Finance</li>

<li><i class="flaticon-right-arrow"></i> Global SME Finance Facility</li>

 


</ul>
 								  -->
										</div>
									</div>
								</div>


			</div>
		</section>
		<!-- End About Us Area -->

		 

	

		@endsection
@section('javascript')

@endsection
