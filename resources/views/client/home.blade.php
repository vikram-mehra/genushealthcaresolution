
@extends('client/layout/master')
@section('main-content')
    <!-- Start Hero Slider Area -->
    <section class="hero-slider-area">
        <div class="hero-slider owl-carousel owl-theme">
        @if(! empty($headers))
        @foreach($headers as $header)
            <div class="hero-slider-item slider-item-bg-2">
                <img src="{{ asset('admin/images/header/1400x729')}}/{{ $header->photo }}" class="slideimg">
                        
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="hero-slider-text">
                                <!-- <span>About Genus</span> -->
                                <h1>{{ $header->heading }}</h1>
                                <!-- <p>We help you for getting success</p> -->
                                <div class="banner-button"> <a class="default-btn" href="{{ url('contact-us') }}">Contact Now </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach
        @endif
        </div>
        <div class="shape shape-1"> <img src="{{url('/public/client')}}/assets/img/shape/1.png" alt="Shape"> </div>
        <div class="shape shape-3"> <img src="{{url('/public/client')}}/assets/img/shape/3.png" alt="Shape"> </div>
        <div class="shape shape-4"> <img src="{{url('/public/client')}}/assets/img/shape/4.png" alt="Shape"> </div>
        <div class="shape shape-5"> <img src="{{url('/public/client')}}/assets/img/shape/5.png" alt="Shape"> </div>
        <div class="shape shape-6"> <img src="{{url('/public/client')}}/assets/img/shape/6.png" alt="Shape"> </div>
        <div class="shape shape-7"> <img src="{{url('/public/client')}}/assets/img/shape/7.png" alt="Shape"> </div>
        <div class="shape shape-8"> <img src="{{url('/public/client')}}/assets/img/shape/1.png" alt="Shape"> </div>
    </section>
    <!-- End Hero Slider Area --> 
    <!-- Start Box Area -->
    <section class="box-area pb-70">
        <div class="container">
            <div class="row">
                @if(! empty($courses))
                @foreach($courses as $course)
                @php $i = 1; @endphp
                <div class="col-lg-3 col-md-6">
                    <div class="single-box bg-1">
                        <!-- <i class="flaticon-statistics"></i> -->
                        <h3>{{ $course->course_name }}</h3>
                        <ul>
                            @if(! empty($course->course_topic))
                            @foreach($course->course_topic as $topic)
                                @if($i < 5)
                                    <li>{{ $topic->subject_title }}</li>
                                @endif
                                @php $i++; @endphp
                            @endforeach
                            @endif
                        </ul>
                        <div class="read-more"> <a href="{{url('/course')}}/{{strtolower($course->course_name)}}">read more +</a></div>
                    </div>
                </div>
                @endforeach
                @endif

                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-box bg-1">
                        <i class="flaticon-statistics"></i>
                        <h3>Business Growth</h3>
                        <p>Lorem ipsum dolor sit amet, consect adipiscing elit, sed do eiusmod tempor incididunt labore.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-box bg-2">
                        <i class="flaticon-creativity"></i>
                        <h3>Strategy Process </h3>
                        <p>Lorem ipsum dolor sit amet, consect adipiscing elit, sed do eiusmod tempor incididunt labore. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-box bg-3">
                        <i class="flaticon-mortarboard"></i>
                        <h3>Finance Manage</h3>
                        <p>Lorem ipsum dolor sit amet, consect adipiscing elit, sed do eiusmod tempor incididunt labore.</p>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- End Box Area --> 
    <!-- Start About Us Area -->
    <section class="about-us-area pb-100">
        <div class="container">
            <div class="row">
                @if(! empty($company))
                <div class="col-lg-6">
                    <div class="about-title">
                        
                        <!-- <span>About Genus</span> -->
                        <h2>{{ $company->title }}</h2>
                        {{--<p>Genus Healthcare Solution has been a part of the US & Indian healthcare industry circuit solidifying its position now for close to two decades. </p>
                        <p>We are emerging as a competent contender in (BPM) Business Process Management offering services in verticals like Medical Billing, Coding et al; designing tailored solutions and serving some leading and well-known healthcare companies in the US including pharmaceutical, biotech and healthcare institutions.</p>--}}
                        <p><?=$company->content?></p>
                        <a class="default-btn" href="{{ url('about')}}">Read More</a> 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-img">
                        <img src="{{ asset('admin/images/company/636x460')}}/{{ $company->photo }}">
                        <!-- <div class="about-img-2">
                            <img src="{{url('/public/client')}}/assets/img/about-2.jpg"> 
                        </div> -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End About Us Area --> 
    <!-- Start Best Service Area -->
    <section class="best-services-area ptb-100">
        <div class="container">
            <div class="section-title">
                <!--  <span>Genus</span> -->
                <h2>Our Best Training</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(! empty($trainings))
                    <div class="tabs-area">
                        <ul class="nav nav-pills d-sm-flex d-block text-center justify-content-between pt-15" id="pills-tab" role="tablist">
                            @foreach($trainings as $t)
                            <li class="nav-item">
                                <i class="flaticon-steering-wheel"></i> 
                                <a class="nav-link {{($loop->iteration == 1) ? 'active' : ''}}" id="pills-{{ $loop->iteration }}-tab" data-bs-toggle="pill" href="#pills-{{ $loop->iteration }}" role="tab" aria-controls="pills-{{ $loop->iteration }}" aria-selected="true">
                                    <!-- <i class="flaticon-pie-chart"></i> --> {{ $t->heading }} 
                                </a>
                            </li>
                            @endforeach

                            {{--<li class="nav-item">
                                <a class="nav-link" id="pills-2-tab" data-bs-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">
                                    <!-- <i class="flaticon-hand"></i>  -->Medical Billing & AR 
                                </a>
                            </li>
                            <li class="nav-item">
                                <i class="flaticon-tracking"></i> 
                                <a class="nav-link" id="pills-3-tab" data-bs-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">
                                    <!--  <i class="flaticon-strategy"></i>  -->Claims Adjudication 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-4-tab" data-bs-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">
                                    <!-- <i class="flaticon-consultant"></i> --> On Job Training 
                                </a>
                            </li>--}}
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach($trainings as $t)
                        <div class="tab-pane fade {{($loop->iteration == 1) ? 'show active' : ''}}" id="pills-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="pills-{{ $loop->iteration }}-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <div class="best-service-img"> <img src="{{ asset('admin/images/training/186x184')}}/{{ $t->photo }}" alt="Service"> </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="best-service-area">
                                        <h3>{{ $t->heading }}</h3>
                                        {{ $t->short_content }}
                                        <!-- <p>Medical coding CPC preparation course syllabus
                                            The Professional Medical Coding training module covers the CPT, HCPCS, ICD-10-CM codes and coding guidelines. 
                                        </p>
                                        <h4>CPC Exam Training and Syllabus</h4>
                                        <p><strong>Prerequisites:</strong> Knowledge of medical terminology and anatomy strongly recommended or Graduation in Life-sciences domain.</p> -->
                                        <!--<p><strong>Clock Hours:</strong> 80 hours for experienced trainees and 120 hours for Freshers in classes. Study time will vary widely per individual.</p>
                                            <p><strong>Course Length:</strong> To be completed in 2 months. CPC exam will be scheduled in the next month after completion of syllabus.</p> -->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a class="default-btn pull-right" href="{{url('/training')}}/{{strtolower($t->heading)}}">Read More</a> 
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{--<div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <div class="best-service-img"> <img src="assets/img/best-service/04.jpg" alt="Service"> </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="best-service-area">
                                        <h3>Medical Coding</h3>
                                        <p>Medical coding CPC preparation course syllabus
                                            The Professional Medical Coding training module covers the CPT, HCPCS, ICD-10-CM codes and coding guidelines. 
                                        </p>
                                        <h4>CPC Exam Training and Syllabus</h4>
                                        <p><strong>Prerequisites:</strong> Knowledge of medical terminology and anatomy strongly recommended or Graduation in Life-sciences domain.</p>
                                        <!--<p><strong>Clock Hours:</strong> 80 hours for experienced trainees and 120 hours for Freshers in classes. Study time will vary widely per individual.</p>
                                            <p><strong>Course Length:</strong> To be completed in 2 months. CPC exam will be scheduled in the next month after completion of syllabus.</p> -->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a class="default-btn pull-right" href="medical-coding.html">Read More</a> 
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <div class="best-service-img"> <img src="assets/img/best-service/03.jpg" alt="Service"> </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="best-service-area">
                                        <h3>Medical Billing & AR </h3>
                                        <p>The US medical insurance industry is a rapidly growing multi-billion dollar industry. Medical Billing/Revenue Cycle Management (RCM) is an important part of this industry. Medical billing includes submitting and following up on claims to insurance companies in order to receive payment for services rendered by healthcare providers. Medical billers play a very crucial role in ensuring operations run smoothly between insurance companies, physicians and patients. There is a great demand for well-trained medical billers in India.</p>
                                        <!-- <p>Clock Hours: 40 hours for experienced, 120 hours for fresh candidates as part of classroom session.</p>
                                            <p>Course Length: 6 weeks comprehensive program.</p>
                                            <p>Certificate of Completion Issued: Yes along with placement assistance.</p>
                                            <p>Course Description: Brilliantly designed & exhaustive module to make you ready for live production immediately after completion of the course. You will be trained to fulfil the current industry requirements for end-to-end processing:</p> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a class="default-btn pull-right" href="medical-billing-ar.html">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <div class="best-service-img"> <img src="assets/img/best-service/01.jpg" alt="Service"> </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="best-service-area">
                                        <h3>Claims Adjudication</h3>
                                        <p>Coming Soon</p>
                                        <ul>
                                            <li> <i class="flaticon-check-mark"></i> SME Finance Investment Service </li>
                                            <li> <i class="flaticon-check-mark"></i> SME Finance Advisory Finance </li>
                                            <li> <i class="flaticon-check-mark"></i> Global SME Finance Facility </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a class="default-btn pull-right" href="claims-adjudication.html">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <div class="best-service-img"> <img src="assets/img/best-service/02.jpg" alt="Service"> </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="best-service-area">
                                        <h3>On Job Training</h3>
                                        <p>30 Days specilized training on live reports which will cover different Speciality as per choice of Candidates i.e.</p>
                                        <ul>
                                            <li> <i class="flaticon-check-mark"></i> Surgery </li>
                                            <li> <i class="flaticon-check-mark"></i> E/M </li>
                                            <li> <i class="flaticon-check-mark"></i> Radiology </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a class="default-btn pull-right" href="on-job-training.html">Read More</a>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Best Service Area --> 
    <!-- Start Choose Area -->
    <section class="choose-area ptb-100">
        <div class="container">
            <div class="section-title">
                <!-- <span>Genus</span> -->
                <h2>Our Video</h2>
            </div>
            <div class="row align-items-center">
                <div class="choose-bg-area">
                    <div class="row">
                        @if(! empty($videos))
                        @foreach($videos as $vdo)
                        <div class="col-md-4">
                            <div class="video">
                                <iframe src="{{ $vdo->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="video-name">{{ $vdo->name }}</div>
                        </div>
                        @endforeach
                        @endif
                        {{--<div class="col-md-4">
                            <div class="video">
                                <iframe src="https://www.youtube.com/embed/qlXKdUV_eRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="video-name">How to Start A Consulting Business</div>
                        </div>
                        <div class="col-md-4">
                            <div class="video">
                                <iframe src="https://www.youtube.com/embed/Yyi7v56SUoQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="video-name">How to Start A Consulting Business</div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Choose Area --> 
    <!-- Start Financial Area -->
    <div class="container">
        <div class="section-title">
            <!--  <span>Genus Clients</span> -->
            <h2>Blog</h2>
        </div>
    </div>
    <section class="financial-area2">
        <div class="container-fluid p-0">
            <div class="row m-0">
                @if (! empty($blogs))
                @foreach($blogs as $blog)
                <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                    <div class="financial-image bg-1"> <img src="{{ asset('admin/images/blog/418x346')}}/{{ $blog->photo }}" alt="image"> </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                    <div class="financial-text">
                        <!--  <div class="icon"> <i class="flaticon-development"></i> </div> -->
                        <h3>{{ $blog->heading }}</h3>
                        <p>{{ $blog->short_content }}</p>
                        <a href="{{url('/blog-details/')}}/{{ $blog->heading }}" class="default-btn">Read More <span></span></a>
                        <div class="shape"> <img src="{{ asset('client/assets/img/shape/2.png')}}" alt="image"> </div>
                    </div>
                </div>
                @endforeach
                @endif
            {{--<div class="col-lg-3 col-sm-6 col-md-6 p-0">
                    <div class="financial-image bg-2"> <img src="assets/img/blog2.jpg" alt="image"> </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                    <div class="financial-text">
                        <!-- <div class="icon"> <i class="flaticon-interview"></i> </div> -->
                        <h3>Design a Stunning Blog</h3>
                        <p>When it comes to design, the Wix blog has everything you need to create beautiful posts that will grab your reader's attention. Check out...</p>
                        <a href="#" class="default-btn">Read More  <span></span></a>
                        <div class="shape"> <img src="{{ assets('client/assets/img/shape/2.png')}}/{{ $blog->photo }}" alt="image"> </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
    <!-- End Financial Area --> 
    <!-- Start Partner Area -->
    <div class="partner-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <!--  <span>Genus Clients</span> -->
                <h2>Our Clients</h2>
            </div>
            <div class="partner-wrap owl-carousel owl-theme">
                @if (! empty($clients))
                @foreach($clients as $client)
                    <div class="single-logo">
                        <img src="{{ asset('admin/images/client/168x88')}}/{{ $client->photo }}" alt="Partner">
                    </div>
                @endforeach
                @endif
                <!-- <div class="single-logo">
                    <img src="assets/img/client-img/2.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/3.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/4.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/5.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/6.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/7.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/8.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/9.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/10.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/11.jpg">
                </div>
                <div class="single-logo">
                    <img src="assets/img/client-img/12.jpg">
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Partner Area -->
@endsection
@section('javascript')

@endsection






 

