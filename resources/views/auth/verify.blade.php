<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{siteName()}} | Register Successfully" />
    <meta property="og:title" content="{{siteName()}} | Register Successfully" />
    <meta property="og:description" content="{{siteName()}} | Register Successfully" />
      <meta property="og:image" content="{{asset('mainpage/images/mainpage.jpeg')}}" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{siteName()}} | Register Successfully</title>

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
                                    <form  method="POST" action="#">
                                     
                                        <div class="mb-3">
                                            @if(session()->has('messages'))
                                            <?php
                                    $user_details=session()->get('messages')
                                  ?>
              
              
              
                                            <h4 style="color: #000">Congratulations!  Your Account has been successfully Created.</h4>
                                            <br>
              
                                            <h4 style="color: #000">Dear <span class="main-color"
                                                    style="color: #ffc70d;font-weight: 700;">{{$user_details['name']  }}</span>,
                                            </h4>
                                            <br>
                                            <h4 style="color: #000"> You have been successfully registered. <br> Your
                                                user id is <span class="main-color"
                                                    style="    color: #1885c1;font-weight: 700;">{{$user_details['username']  }}</span>
                                                Password is: <span class="main-color" style="color: #1885c1;font-weight: 700;">
                                                    {{$user_details['PSR']  }}</span> and Transaction Password is: <span class="main-color" style="color: #1885c1;font-weight: 700;">
                                                        {{$user_details['TPSR']  }}</span>
                                                please check your mail for more details.</h4>
              
                                            @endif
                                        </div>
                                      
                                       
                                        <div class="text-center">
                                            <a href="{{route('login')}}" class="btn btn-primary btn-block">Sign Me In</a>
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
