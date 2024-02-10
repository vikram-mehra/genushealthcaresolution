<!doctype html>
<html lang="zxx">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/bootstrap.min.css">
<!-- Owl Theme Default Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/owl.theme.default.min.css">
<!-- Owl Carousel Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/owl.carousel.min.css">
<!-- Animate Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/animate.min.css">
<!-- Flaticon CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/flaticon.css">
<!-- Nice Select Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/nice-select.min.css">
<!-- Font Awesome Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/font-awesome.min.css">
<!-- Imagelightbox Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/imagelightbox.min.css">
<!-- Meanmenu Min CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/meanmenu.min.css">
<!-- Style CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{url('/public/client')}}/assets/css/responsive.css">

<!-- Favicon -->
<link rel="shortcut icon" type="{{url('/public')}}/image/x-icon" href="favicon.ico">
<!-- Title -->
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<title>Genus Healthcare Solution</title>


</head>
@php
    use App\Models\Course;
    use App\Models\Training;
    $courses = Course::whereStatus(1)->get();
    $trainings = Training::whereStatus(1)->get();
@endphp
<body>
<a href="https://api.whatsapp.com/send?phone=919873961111" id="whatsapp" class="fa fa-whatsapp text-theme-colored font-36 mt-5 sm-display-block" style="padding-top: 7px; color:#ffffff!important;" rel="nofollow" target="_blank"></a> 
<!-- Start Navbar Area -->
<div class="peru-nav">
  <div class="navbar-area fixed-top"> 
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav"> <a href="{{url('/')}}" class="logo"> <img src="{{url('/public/client')}}/assets/img/logo.png" alt=""> </a> </div>
    
    <!-- Menu For Desktop Device -->
    <div class="main-nav peru-nav-style">
      <nav class="navbar navbar-expand-md navbar-light">
        <div class="container"> <a class="navbar-brand" href="{{url('/')}}"> <img src="{{url('/public/client')}}/assets/img/logo.png" alt=""> </a>
          <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
              <li class="nav-item"><a href="{{url('/')}}" class="nav-link {{ Request::Is('/') ? 'active' : '' }}">Home</a></li>
              <li class="nav-item"><a href="{{url('/about')}}" class="nav-link {{ Request::Is('about') ? 'active' : '' }}">About Us</a></li>
               <li class="nav-item"><a href="#" class="nav-link dropdown-toggle {{ Request::Is('course/*') ? 'active' : '' }}">Courses</a>
                <ul class="dropdown-menu dropdown-style">
                  @if(! empty($courses))
                  @foreach($courses as $course)
                    <li><a href="{{url('/course')}}/{{strtolower($course->course_name)}}">{{$course->course_name}}</a></li>
                  @endforeach
                  @endif
                  
                  <!-- <li><a href="{{url('/course/math')}}">Math</a></li>
                  <li><a href="{{url('/course/math')}}">Physics</a></li>
                  <li><a href="{{url('/course/math')}}">Chemistry</a></li>
                  <li><a href="{{url('/course/math')}}">biology</a></li> -->
                </ul>
              </li>
              <li class="nav-item"><a href="{{url('/rcm')}}" class="nav-link {{ Request::Is('rcm') ? 'active' : '' }}">RCM</a></li>
              <li class="nav-item"><a href="{{url('/career')}}" class="nav-link {{ Request::Is('career') ? 'active' : '' }}">Career</a></li>
               <li class="nav-item"><a href="#" class="nav-link dropdown-toggle {{ Request::Is('training/*') ? 'active' : '' }}">Training</a>
                <ul class="dropdown-menu dropdown-style">
                  @if(! empty($trainings))
                  @foreach($trainings as $training)
                    <li><a href="{{url('/training')}}/{{strtolower($training->heading)}}">{{$training->heading}}</a></li>
                  @endforeach
                  @endif
                    <!-- <li><a href="{{url('/training/medical-coding')}}">Medical Coding</a></li>
                    <li><a href="{{url('/training/medical-billing-ar')}}">Medical Billing & AR</a></li>
                    <li><a href="{{url('/training/claims-adjudication')}}">Claims Adjudication</a></li>
                    <li><a href="{{url('/training/on-job-training')}}">On Job Training</a></li> -->
                </ul>
              </li>
              <li class="nav-item"><a href="{{url('/videos')}}" class="nav-link {{ Request::Is('videos') ? 'active' : '' }}">Videos</a></li>
              <!--<li class="nav-item"><a href="clients.html" class="nav-link">Clients</a></li>-->
              <li class="nav-item"><a href="{{url('/blogs')}}" class="nav-link {{ Request::Is('blog') ? 'active' : '' }}">Blog</a></li>
              <li class="nav-item"><a href="{{url('/contact-us')}}" class="nav-link {{ Request::Is('contact-us') ? 'active' : '' }}">Contact Us</a></li>
            </ul>
            <div class="others-option"> <a href="tel:+91 9873961111" class="contact-number"> <i class="fa fa-phone"></i> +91 9911593677 </a> </div>
            <div class="dropdown">
               @php $sessiondata = ''@endphp
                @if(Session::has('studentsession'))
                @php $sessiondata =Session::get('studentsession'); @endphp
              @endif
              <button class="default-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">@if(!empty($sessiondata))
                                                                {{$sessiondata->name}}
                                                              @else
                                                                 Log In
                                                              @endif
                                                               </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <ul>
                 @if(!empty($sessiondata))
                     <li><a class="dropdown-item" href="{{url('/student/my-profile')}}">My Profile</a></li>
                     <li><a class="dropdown-item" href="{{url('student/change-password')}}">Change Password</a></li>
                     <li><a class="dropdown-item" href="{{url('/student/logout')}}">Logout</a></li>
                  @else
                    <li><a class="dropdown-item" href="{{url('/student/log-in')}}">Student Login</a></li>
                    <li><a class="dropdown-item" href="{{url('/hr/login')}}">HR Login</a></li>
                  @endif
                  
             
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- End Navbar Area --> 

@yield('main-content')

  <!-- Start Footer Top Area -->
  <section class="footer-top-area pt-100 pb-70">
      <div class="zxx">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-6">
                      <div class="single-widget">
                          <h3>Contact Info</h3>
                          <!--  <p>Contact Us  for Medical Coding Training, CPC Certification Training, Surgery Coding Training</p> -->
                          <ul class="address">
                              <li> <i class="fa fa-map-marker"></i> B720-721, Tower B, I-Thum Tower, Sector 62, Noida <br>
                                  Pin - 201301, (U.P.) 
                              </li>
                              <li> <i class="fa fa-phone"></i> <a href="tel:+91 9911222639">+91 9911222639 </a> </li>
                              <li> <i class="fa fa-envelope"></i> <a href="mailto:info@genushealthcaresolution.com"> info@genushealthcaresolution.com </a> </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-6">
                      <div class="single-widget">
                          <h3>Usful Links</h3>
                          <ul class="links">
                              <li><a href="{{ url('/') }}"><i class="fa fa-angle-double-right"></i> Home</a></li>
                              <li><a href="{{ url('/about') }}"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                              <li><a href="{{ url('/rcm') }}"><i class="fa fa-angle-double-right"></i> RCM</a></li>
                              <li><a href="{{ url('/career') }}"><i class="fa fa-angle-double-right"></i> Career</a></li>
                              <li><a href="contact-us"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-6">
                      <div class="single-widget">
                          <h3>Support</h3>
                          <ul class="links">
                              <li><a href="{{ url('/videos') }}"><i class="fa fa-angle-double-right"></i> Videos</a></li>
                              <li><a href="#"><i class="fa fa-angle-double-right"></i> Clients</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="single-widget">
                          <h3>Social Links</h3>
                          <ul class="social-icon">
                              <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                              <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                              <li> <a href="#"> <i class="fa fa-linkedin"></i> </a> </li>
                              <li> <a href="#"> <i class="fa fa-pinterest-p"></i> </a> </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End Footer Top Area --> 
  <!-- Start Footer Bottom Area -->
  <footer class="footer-bottom-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6">
                  <div>
                      <p> Copyright <i class="fa fa-copyright"></i>2022 Genus Healthcare Solution | All Rights Reserved. </a> </p>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="powerd"> <a href="https://www.akswebsoft.com/" target="_blank" title="AKS Websoft Consulting Pvt. Ltd."> <img src="{{ asset('client/assets/img/aks.png')}}" alt="AKS Websoft Consulting Pvt. Ltd."></a> </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- End Footer Bottom Area --> 
  <!-- Start Go Top Area -->
  <div class="go-top"> <i class="fa fa-angle-double-up"></i> <i class="fa fa-angle-double-up"></i> </div>
  <!-- End Go Top Area --> 

<!-- Start Go Top Area -->
<div class="go-top"> <i class="fa fa-angle-double-up"></i> <i class="fa fa-angle-double-up"></i> </div>
<!-- End Go Top Area --> 

<!-- Jquery Min JS --> 
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{url('/public/client')}}/assets/js/jquery.min.js"></script> 
<!-- Bootstrap Bundle Min JS --> 
<script src="{{url('/public/client')}}/assets/js/bootstrap.bundle.min.js"></script> 
<!-- Meanmenu Min JS --> 
<script src="{{url('/public/client')}}/assets/js/meanmenu.min.js"></script> 
<!-- Wow Min JS --> 
<script src="{{url('/public/client')}}/assets/js/wow.min.js"></script> 
<!-- Owl Carousel Min JS --> 
<script src="{{url('/public/client')}}/assets/js/owl.carousel.min.js"></script> 
<!-- Imagelightbox Min JS --> 
<script src="{{url('/public/client')}}/assets/js/imagelightbox.min.js"></script> 
<!-- Mixitup Min JS --> 
<script src="{{url('/public/client')}}/assets/js/mixitup.min.js"></script> 
<!-- Nice Select Min JS --> 
<script src="{{url('/public/client')}}/assets/js/nice-select.min.js"></script> 
<!-- Form Validator Min JS --> 
<script src="{{url('/public/client')}}/assets/js/form-validator.min.js"></script> 
<!-- Contact JS --> 
<script src="{{url('/public/client')}}/assets/js/contact-form-script.js?id=1234"></script> 
<!-- Ajaxchimp Min JS --> 
<script src="{{url('/public/client')}}/assets/js/ajaxchimp.min.js"></script> 
<!-- Custom JS --> 
<script src="{{url('/public/client')}}/assets/js/custom.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
      case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

</script>
<script type="text/javascript">
       $('.sub-menu ul').hide();
          $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
          });
</script>
<script type="text/javascript">
  document.oncontextmenu =new Function("return false;")
  document.onselectstart =new Function("return false;")
</script>

@yield('javascript')
