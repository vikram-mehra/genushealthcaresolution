<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Genus Healthcare Solution | HR Panel</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="d-flex h100vh align-items-center auth-main w-100">
                            <div class="auth-box">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header d-flex align-items-center justify-content-between" style="background: linear-gradient(to left, #00427e 0%, #ffffff 70%);">
                                        <a href="{{url('/')}}"><img src="images/logo.png" alt=""></a>
                                        <h5 class="text-center font-weight-bold">HR Panel</h5>
                                    </div>
                                    <form action="{{url('/hr/login')}}" method="post">
                                    	@csrf
	                                    <div class="card-body p-sm-5">
	                                    	@isset($data['error'])
                                            	<span  style="color:Red;font-size:Small;"> {{$data['error']}} </span>
                                            @endisset  
	                                        <div class="frm-box">
	                                            <label><img src="images/log-d.png"></label>
	                                            <input type="text" name="email" value="" placeholder="Username">
                                                <div class="clear"></div>
	                                        </div>
	                                        @if (!empty($errors))
                                            <p style="color:red" >{{ $errors->first('email') }}</p>
                                            @endif
	                                        <div class="frm-box">
	                                            <label> <img src="images/log-b.png"></label>
	                                            <input type="password" name="password" value="" placeholder="Password">
	                                            <div class="clear"></div>
	                                        </div>
	                                        @if (!empty($errors))
                                            <p style="color:red" >{{ $errors->first('password') }}</p>
                                            @endif
	                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
	                                            <button class="btn btn-primary" type="submit">Login</button> 
	                                        </div>
	                                    </div>
	                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
        <script src="js/scripts.js"></script>
    </body>
</html>