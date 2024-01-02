<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Genus Healthcare Solution</title>
        <link rel="shortcut icon" type="{{url('/public')}}/image/x-icon" href="favicon.ico">
        <link href="{{url('/public/admin')}}/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 pt-sm-5 mt-sm-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <a href="{{ url('/') }}"><img src="{{url('/public/admin')}}/images/logo.png" alt=""></a>
                                        <h5 class="text-center font-weight-bold">Admin Login</h5>
                                    </div>
                                    <form action="{{url('/admins-login')}}" method="post">
                                        @csrf
                                        <div class="card-body p-sm-5">
                                            @isset($data['error'])
                                            <span  style="color:Red;font-size:Small;"> {{$data['error']}} </span>
                                            @endisset  
                                            <div class="frm-box">
                                                <label><img src="{{url('/public/admin')}}/images/log-d.png"></label>
                                                <input type="text" name="email" value="" placeholder="Username">
                                                <div class="clear"></div>
                                            </div>
                                            @if (!empty($errors))
                                            <p style="color:red" >{{ $errors->first('email') }}</p>
                                            @endif  
                                            <div class="frm-box">
                                                <label> <img src="{{url('/public/admin')}}/images/log-b.png"></label>
                                                <input type="password" name="password" value="" placeholder="Password">
                                                <div class="clear"></div>
                                            </div>
                                            @if (!empty($errors))
                                            <p style="color:red" >{{ $errors->first('password') }}</p>
                                            @endif  
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> --> 
                                                <button class="btn btn-primary loginbtn px-5" type="submit">Login</button> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 mt-auto bg-primary fotr">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div>
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script> Genus Healthcare Solution | All Rights Reserved
                            </div>
                            <div> <a href="https://www.akswebsoft.com/" title="AKS Websoft Consulting Pvt. Ltd." target="_blank"><img src="{{url('/public/admin')}}/images/aks2.png" alt="AKS Websoft Consulting Pvt. Ltd." class="powerd"></a> </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
        <script src="{{url('/public/admin')}}/js/scripts.js"></script>
    </body>
</html>