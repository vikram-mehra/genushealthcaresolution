@extends('client/layout/master')
@section('main-content')

		<!-- Start Page Title Area -->
		<div class="page-title-area item-bg-1">
			<div class="container">
				<div class="page-title-content">
					<h2>RCM</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
						<li>RCM</li>
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
							<span>About</span>
							<?=$rcm->content?>
							<!-- <h2>Revenue Cycle Management</h2>
							  <p>As one of the leading providers of medical billing services, Genus Healthcare has the experience to provide you with multi-specialty medical billing services utilizing a management team that has been together for more than 20 years. Genus Healthcare met mandatory Compliance/HIPAA standards. Genus Healthcare can assure you the highest level of security and protection of PHI. Operating for more than 5 years providing healthcare revenue Cycle Management Services to over 100 physicians across the country. Genus Healthcare affords you the highest level of medical billing and collections services along with the expertise to help you navigate the constant changing healthcare environment.</p>

							  <div class="col-md-12"><div class="image-banner"><img src="{{url('public/client')}}/assets/img/revenue-cycle-management.jpg"></div></div>

<p>As the healthcare delivery system continues to be more complex and difficult to navigate having an outsourced medical billing partner like Genus Healthcare has never been more essential. With Genus Healthcare  as your revenue cycle management partner, your revenues will increase, your days in A/R (AR follow up in medical billing) will be reduced and you and your staff will be kept informed of all regulatory changes that can impact your ability to maximize your clinical efforts. Genus Healthcare provide your practice 92% first claims pass acceptance, 95% of claims paid in 30 days and 99% of payer claims collected which equates to smoother revenue stream, better collections and increased profitability.</p>

<p>Our expertise in providing medical billing services, certified coding and our in depth knowledge of the associated rules and processes enhances our ability to maximize your reimbursement. As a premier medical billing company our services include not only working with established providers or groups, but with startup practices as well. As your medical billing company Genus Healthcare  provides: fee schedule analysis, healthcare contract management, Insurance eligibility verification, implementing customized billing protocols and providing education.

 </p>

<p>Genus Healthcare  and its dedicated team of experienced professionals take on the task of coding and billing, medical claims processing, healthcare denial management, procedure/diagnosis analysis by certified coders, physician practice management, while keeping you informed of the health of your practice/financials. We file claims electronically resulting in a faster turnaround time, which means you get paid for your hard work sooner and at the highest rate allowable. Plus our overall rate to collect is significantly lower than the national average, thereby improving margin and cash flow.</p>

 

<h4>Genus Healthcare  provides medical billing services to over 100 physicians in the following specialties:</h4>
<div class="row">
	<div class="col-md-4">
<ul class="mb-0">
<li><i class="flaticon-right-arrow"></i>Anesthesiology</li>

<li><i class="flaticon-right-arrow"></i>Cardiology</li>

<li><i class="flaticon-right-arrow"></i>Dermatology</li>

<li><i class="flaticon-right-arrow"></i>Endocrinology</li>

<li><i class="flaticon-right-arrow"></i>ENT</li>

<li><i class="flaticon-right-arrow"></i>Family Medicine</li>


	</ul>

 </div>


<div class="col-md-4">
<ul class="mb-0">
 <li><i class="flaticon-right-arrow"></i>Gastroenterology</li>

<li><i class="flaticon-right-arrow"></i>Internal Medicine</li>

<li><i class="flaticon-right-arrow"></i>Nephrology</li>

<li><i class="flaticon-right-arrow"></i>Neurology</li>

<li><i class="flaticon-right-arrow"></i>OB/GYN</li>


	</ul>

 </div>



 <div class="col-md-4">
<ul class="mb-0">
<li><i class="flaticon-right-arrow"></i>Ophthalmology</li>

<li><i class="flaticon-right-arrow"></i>Pediatric Cardiology</li>

<li><i class="flaticon-right-arrow"></i>Physiatrist</li>

<li><i class="flaticon-right-arrow"></i>Podiatry</li>

<li><i class="flaticon-right-arrow"></i>Radiology</li>
	</ul>

 </div>

</div>
							 
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