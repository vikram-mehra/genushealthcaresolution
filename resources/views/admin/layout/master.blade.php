<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Genus Healthcare Solution</title>
        <link rel="shortcut icon" type="{{url('/public/admin')}}/image/x-icon" href="favicon.ico">
        <link href="{{url('public/admin')}}/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script> -->
       

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url('admin/dashboard')}}"><img src="{{url('public/admin')}}/images/logo.png" alt="logo image"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <h6 class="pl-3">Welcome Admin!</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Change Password</a> <a class="dropdown-item" href="{{ url('/admin/logout') }}">Logout</a> 
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link {{ Request::routeIs('admin/dashboard') ? 'active' : '' }}" href="{{url('admin/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard 
                            </a>
                            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseLayoutsHomepage" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Home Page 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsHomepage" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ url('/admin/header') }}">Header</a> 
                                    <a class="nav-link" href="{{ url('/admin/company-details') }}">About Company</a> 
                                    <a class="nav-link" href="{{ url('/admin/clients') }}">Clients</a> 
                                </nav>
                            </div>
                            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                About Us 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">  <a class="nav-link" href="{{ url('/admin/about-content') }}">About Content</a> 
                                    <a class="nav-link" href="{{ url('/admin/team-details') }}">Team Details</a> 
                                </nav>
                            </div>
                            <a class="nav-link" href="{{ url('/admin/rcm') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>RCM
                            </a>
                            <a class="nav-link" href="{{ url('/admin/careers') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>Career
                            </a>
                            <a class="nav-link" href="{{ url('/admin/training') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>Training
                            </a>
                            <a class="nav-link" href="{{ url('/admin/blog') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>Blog
                            </a>
                            <a class="nav-link" href="{{ url('/admin/video') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>Video
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts10" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Student Registration
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts10" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('admin/register/register')}}">Add Register</a> 
                                    <a class="nav-link" href="{{url('admin/register/register-view')}}">View Register</a> 
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Courses
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('admin/course/add-course')}}">Add Course</a> 
                                    <a class="nav-link" href="{{url('/admin/course/add-topic-detail')}}">Add Topic Detail</a> 
                                    <a class="nav-link" href="{{url('/admin/course/assign-topic')}}">Assign Topic</a> 
                                    <a class="nav-link" href="{{url('admin/add-video')}}">Add Video</a> 
                                </nav>
                            </div>
                            <!-- <a class="nav-link" href="{{url('admin/add-video')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Add Video 
                            </a> -->
                            <a class="nav-link" href="{{url('admin/add-pdf')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Add PDf 
                            </a>
                            <a class="nav-link" href="{{url('/admin/exam')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Question 
                            </a>
                            <a class="nav-link" href="{{url('/admin/payment-history')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Payment History 
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Enquiry 
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsHR" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                HR Registeration
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsHR" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('admin/hr/add')}}">Add HR</a> 
                                    <a class="nav-link" href="{{url('admin/hr/list')}}">List HR</a> 
                                </nav>
                            </div>
                            <a class="nav-link" href="{{ url('/admin/company') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Company
                            </a>
                            <a class="nav-link" href="{{ url('/admin/candidate/add') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Add Candidate
                            </a>
                            <a class="nav-link" href="{{ url('/admin/candidate/list') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                All Candidate List
                            </a>

                             
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                        </div> --> 
                </nav>
            </div>
            <div id="layoutSidenav_content">
                @yield('main-contant')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div>
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script> Genus Healthcare Solution | All Rights Reserved
                            </div>
                            <div> <a href="https://www.akswebsoft.com/" title="AKS Websoft Consulting Pvt. Ltd." target="_blank"><img src="{{ asset('admin/images/aks2.png') }}" alt="AKS Websoft Consulting Pvt. Ltd." class="powerd"></a> </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
        <script src="{{url('public/admin')}}/js/scripts.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> 
        <script src="{{url('public/admin')}}/assets/demo/chart-area-demo.js"></script> 
        <script src="{{url('public/admin')}}/assets/demo/chart-bar-demo.js"></script> 
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js?id1=1" crossorigin="anonymous"></script> 
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> 
        <script src="{{url('public/admin')}}/assets/demo/datatables-demo.js"></script>

        <!-- Select2 JS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        
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
      
    </body>
</html>
@yield('javascript')