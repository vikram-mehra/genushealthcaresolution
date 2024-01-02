<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Genus Healthcare Solution | HR Panel</title>
        <link rel="shortcut icon" type="{{url('/public/admin')}}/image/x-icon" href="favicon.ico">
        <link href="{{url('public/hr')}}/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html"><img src="{{url('public/hr')}}/images/logo.png" alt="logo image"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <div class="col-sm-5 d-flex flex-sm-row-reverse">
                <h4 class="panelhd">HR Panel</h4>
            </div>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <i class="fas fa-user fa-fw"></i> --><!-- <img src="{{url('public/hr')}}/images/user.png"> -->{{\Session::get('hrName')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <h6 class="pl-3">Welcome HR Panel!</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/hr/change-password') }}">Change Password</a> <a class="dropdown-item" href="{{ url('/hr/logout') }}">Logout</a> 
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
                            <a class="nav-link {{ Request::routeIs('hr/dashboard') ? 'active' : '' }}" href="{{url('hr/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                HR Dashboard 
                            </a>
                            <a class="nav-link" href="{{ url('/hr/candidate/add') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Add Candidate
                            </a>
                            <a class="nav-link" href="{{ url('/hr/candidate/interview') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                Assign Candidate Interview
                            </a>
                            <a class="nav-link" href="{{ url('/hr/candidate/list') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-caret-right"></i></div>
                                All Candidate List
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                @yield('main-contant')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div>
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script> Genus Healthcare Solution | HR Panel | All Rights Reserved
                            </div>
                            <div> <a href="https://www.akswebsoft.com/" title="AKS Websoft Consulting Pvt. Ltd." target="_blank"><img src="{{ url('hr/images/aks2.png')}}" alt="AKS Websoft Consulting Pvt. Ltd." class="powerd"></a> </div>
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
        <script src="{{url('public/admin')}}/https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> 
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> 
        <script src="{{url('public/admin')}}/assets/demo/datatables-demo.js"></script>
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