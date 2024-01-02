
@extends('client/layout/master')
@section('main-content')

		<!-- Start Page Title Area -->
		<div class="page-title-area item-bg-1">
			<div class="container">
				<div class="page-title-content">
					<h2>About Us</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
						<li>About Us</li>
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
							<span>About Us</span>
							<?=$aboutUs->content?>
							{{--<h2>We Provide Genus Healthcare Solution</h2>
							<p>Genus Healthcare Solution has been a part of the US &amp; Indian healthcare industry circuit solidifying its position now for close to two decades. </p>

 

<p>We are emerging as a competent contender in (BPM) Business Process Management offering services in verticals like Medical Billing, Coding et al; designing tailored solutions and serving some leading and well-known healthcare companies in the US including pharmaceutical, biotech and healthcare institutions.</p>

 
<p>Our outlook and goals are shaped by what we’ve observed in our day-to-day experience including a dearth of good talent and challenges faced by various verticals in healthcare industry. </p>

 

<p>While offering various solutions, we’ve combined our knowledge of healthcare industry and Business Process Management (BPM) with technology; creating solutions based on best industrial practices, and ensuring best talent within India at your service. </p>

 

<p>We offer three types of services through this website. Facilitate Training to candidates interested in pursuing career that will help them find employment opportunities in select verticals in healthcare industries worldwide; suitable Recruitment & Placement of trained individuals (Currently in India only); and Outsourcing Medical Billing & Coding services to clinics, pharmacy companies, & hospitals worldwide through our robust framework of technology, specialists, and experts. We’re also equipped to provide customised services & solutions to meet specific requirements like large BPO projects etc. </p>

 

<p>To deliver high standard training and meet outsource demands we use the most relevant infrastructure, high-end software & technologies, client centric approach, expert MTs, QAs, Coders and Billing Execs rendering 24 x 7 end to end solutions in varied spheres of medical care. 
  </p>--}}
 
 
							 
							 
						</div>
					</div>
					 
				</div>
			</div>
		</section>
		<!-- End About Us Area -->

		 

		 

		<!-- Start Client Area -->
		<section class="client-area ptb-100">
			<div class="container">
				<div class="section-title">
					<span>Genus Team Member</span>
					<h2>Our Expert Team</h2>
				</div>

				@if(! empty($teamDetails))
				@foreach($teamDetails as $details)
				<div class="row align-items-center client-bg">
					<div class="col-lg-2 p-0">
						<div class="client-img">
							<img src="{{ asset('team/images')}}/{{ $details->photo }}" alt="">
						</div>
					</div>
					<div class="col-lg-10 p-0">
						 <div class="client-details">
								 
								<h3>{{ $details->name }}</h3>
								<h4>{{ $details->designation }}</h4>
								 
								<p>{{ $details->content }}</p>
								 
							</div>
							 
					</div>
				</div>
				@endforeach
				@endif


<!-- <div class="row align-items-center client-bg">
					<div class="col-lg-2 p-0">
						<div class="client-img">
							<img src="{{url('public/client')}}/assets/img/team/2.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-10 p-0">
						 <div class="client-details">
								 
								<h3>Monika Verma</h3>
								<h4>Director</h4>
								 
								<p>Monika comes with an experience of over 6 years in various mid-management roles with global corporates. Currently associated with Genus Healthcare Solution since 2014.</p>
<p>She holds B. Sc IT degree</p>
								 
							</div>
							 
					</div>
				</div>



<div class="row align-items-center client-bg">
					<div class="col-lg-2 p-0">
						<div class="client-img">
							<img src="{{url('public/client')}}/assets/img/team/3.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-10 p-0">
						 <div class="client-details">
								 
								<h3>Shobhit Malik</h3>
								<h4>Director-Operation</h4>
								 
								<p>Shobhit comes with an Experience of over 11 years in various mid-management roles with global corporates in Healthcare; Currently associated with Professional Medical Services and in past with Nath Solution, Eli Global, R-Sytems International. 

​He holds Bachelor in Physiotherapy. He also hold CPC and CIC from American Academy of Professional Coders.</p>
 
								 
							</div>
							 
					</div>
				</div>



				<div class="row align-items-center client-bg">
					<div class="col-lg-2 p-0">
						<div class="client-img">
							<img src="{{url('public/client')}}/assets/img/team/4.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-10 p-0">
						 <div class="client-details">
								 
								<h3>Somesh Bhatt</h3>
								<h4>Director-Operation</h4>
								 
								<p>Somesh comes with an experience of over 15 years in various mid-management roles with global corporates in Healthcare; Currently associated with Genus Healthcare Solution, and in past with Concentrix.</p>
<p>He holds PG Diploma in Business Administration.</p>
								 
							</div>
							 
					</div>
				</div>



<div class="row align-items-center client-bg">
					<div class="col-lg-2 p-0">
						<div class="client-img">
							<img src="{{url('public/client')}}/assets/img/team/5.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-10 p-0">
						 <div class="client-details">
								 
								<h3>Vikas Chawla</h3>
								<h4>Director-Medical Coding</h4>
								 
								<p>Vikas comes with an Experience of over 10 years in various mid-management roles with global corporates in Healthcare; In past he was associated with AAPC- American Academy of Professional Coders, Eli Global, E4E. He hold MBA, CPC and CPMA American Academy of Professional Coders.</p>
								 
							</div>
							 
					</div>
				</div> -->




			</div>
		</section>
		<!-- End Client Area -->

		 

			 
		<!-- Start Footer Top Area -->
		<!-- <section class="footer-top-area pt-100 pb-70">
			<div class="zxx"><div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-widget">
						 <h3>About Info</h3>
							<p>Contact Us  for Medical Coding Training, CPC Certification Training, Surgery Coding Training</p>
							<ul class="address">
								<li>
									<i class="fa fa-map-marker"></i>
									B720-721, Tower B, I-Thum Tower, Sector 62, Noida <br>Pin - 201301, (U.P.)
								</li>
								<li>
									<i class="fa fa-phone"></i>
									<a href="tel:+91 9911222639">+91 9911222639 </a>
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<a href="mailto:info@genushealthcaresolution.com"> info@genushealthcaresolution.com </a>
								</li>
							</ul>


<ul class="social-icon">
							<li>
								<a href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-linkedin"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-pinterest-p"></i>
								</a>
							</li>
						</ul>

						</div>
					</div>
					<div class="col-lg-2 col-md-6">
						<div class="single-widget">
							<h3>Usful Links</h3>
							<ul class="links">
								<li><a href="index.html"><i class="fa fa-angle-double-right"></i> Home</a></li>
								<li><a href="about.html"><i class="fa fa-angle-double-right"></i> About Us</a></li>
								<li><a href="rcm.html"><i class="fa fa-angle-double-right"></i> RCM</a></li>
								<li><a href="career.html"><i class="fa fa-angle-double-right"></i> Career</a></li>
								 <li><a href="contact.html"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6">
						<div class="single-widget">
							<h3>Support</h3>
							<ul class="links">
								 
								<li><a href="videos.html"><i class="fa fa-angle-double-right"></i> Videos</a></li>
 								<li><a href="clients.html"><i class="fa fa-angle-double-right"></i> Clients</a></li>
 							   
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-widget">
							<h3>Media</h3>
							<ul class="instragram">
								<li>
									 
										<img src="{{url('public/client')}}/assets/img/inst/1.jpg" alt="">
									 
								</li>
								<li>
									 
										<img src="{{url('public/client')}}/assets/img/inst/2.jpg" alt="">
								 
								</li>
								<li>
									 
										<img src="{{url('public/client')}}/assets/img/inst/3.jpg" alt="">
									 
								</li>
								<li>
									 
										<img src="{{url('public/client')}}/assets/img/inst/4.jpg" alt="">
									 
								</li>
								<li>
									 
										<img src="{{url('public/client')}}/assets/img/inst/5.jpg" alt="">
									 
								</li>
								<li>
									 
										<img src="{{url('public/client')}}/assets/img/inst/6.jpg" alt="">
								 
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section> -->
		<!-- End Footer Top Area -->

	@endsection
@section('javascript')

@endsection