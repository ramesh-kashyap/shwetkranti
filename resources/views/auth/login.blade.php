<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{siteName()}} | Login" />
    <meta property="og:title" content="{{siteName()}} | Login" />
    <meta property="og:description" content="{{siteName()}} | Login" />
       <meta property="og:image" content="{{asset('upnl/images/tronfx.png')}}" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{siteName()}} | Login</title>

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
            border-color: #36c2e8 !important;
            background-color: #36c2e8 !important;
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
                                    <form  method="POST" action="{{route('login')}}">
                                      {{ csrf_field() }}
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email or Username</strong></label>
                                            <input type="text" class="form-control" name="username" placeholder="Username" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                        preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{route('forgot-password')}}">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{route('register')}}">Sign up</a></p>
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
