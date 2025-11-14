<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{siteName()}} | Forgot Password" />
    <meta property="og:title" content="{{siteName()}} | Forgot Password" />
    <meta property="og:description" content="{{siteName()}} | Forgot Password" />
       <meta property="og:image" content="{{asset('mainpage/images/mainpage.jpeg')}}" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{siteName()}} | Forgot Password</title>

    <style>
         .DZ-theme-btn.DZ-bt-buy-now 
         {
             display: none;
        }
        .DZ-theme-btn.DZ-bt-support-now {
            display: none;
        }
        .at-expanding-share-button[data-position=bottom-left] {
            display: none;
        }


        body 
        {
    color: #ffffff !important;   
        }
        h4 {

            color: #fff !important;
        }

        .btn-primary,.btn-primary:hover {
            border-color: #f8c800 !important;
            background-color: #f8c800 !important;
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('')}}upnl/images/favicon.png" />
    <link href="{{asset('')}}upnl/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{asset('')}}"><img src="{{asset('')}}upnl/images/tronfx.png" style="width: 199px;" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form  method="POST" action="{{route('forgot_submit')}}">
                                      {{ csrf_field() }}
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email or Username</strong></label>
                                            <input type="text" class="form-control" name="username" placeholder="Username" value="">
                                        </div>
                                       
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>have an account? <a class="text-primary" href="{{route('login')}}">Sign In</a></p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('partials.notify')

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('')}}upnl/vendor/global/global.min.js"></script>
    <script src="{{asset('')}}upnl/js/custom.min.js"></script>
    <script src="{{asset('')}}upnl/js/deznav-init.js"></script>

</body>

</html>
