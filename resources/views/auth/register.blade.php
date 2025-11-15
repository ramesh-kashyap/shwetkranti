<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{siteName()}} | Register" />
    <meta property="og:title" content="{{siteName()}} | Register" />
    <meta property="og:description" content="{{siteName()}} | Register" />
    <meta property="og:image" content="{{asset('upnl/images/tronfx.png')}}" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{siteName()}} | Register</title>

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
            border-color: #f1f6f7ff !important;
            background-color: #fed525 !important;
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
                                        <a href="{{asset('')}}"><img src="{{asset('')}}web-assets/images/logo.svg" style="width: 199px;" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form  method="POST" action="{{ route('registers') }}">
                                      {{ csrf_field() }}
                                      @php
                                      $sponsor = @$_GET['ref'];
                                      $name = \App\Models\User::where('username', $sponsor)->first();
                                      @endphp

                                      <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Sponsor ID</strong></label>
                                                <input type="text" class="form-control check_sponsor_exist" value="{{($sponsor)?$sponsor:''}}" data-response="sponsor_res" name="sponsor" required placeholder="Sponsor ID">
                                                <span id="sponsor_res"><?=($name)?$name->name:"";?></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Your Name</strong></label>
                                                <input type="text" class="form-control" name="name" required placeholder="Your Name">
                                            </div>
                                        </div>

                                      </div>


                                      <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Your Email</strong></label>
                                                <input type="email" name="email" id="email" class="form-control" required placeholder="Your Email">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Your Mobile No</strong></label>
                                                <input type="text" name="phone" id="phone" class="form-control" required placeholder="Your Mobile No">
                                            </div>
                                        </div>
                                        
                                      </div>


                                      <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Your Password</strong></label>
                                                <input type="password" name="password" placeholder="Your Password" id="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Confirm Password</strong></label>
                                                <input type="password" name="password_confirmation" placeholder="Confirm Password" id="confirm-password" class="form-control">
                                            </div>
                                        </div>
                                        
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
                                          
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block submit-btn">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p> Already have an account <a class="text-primary" href="{{route('login')}}">Sign In</a></p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>
    <script>

        $('.check_sponsor_exist').keyup(function(e) {
            var ths = $(this);
            var res_area = $(ths).attr('data-response');
            var sponsor = $(this).val();
            // alert(sponsor); 
            $.ajax({
                type: "POST"
                , url: "{{ route('getUserName') }}"
                , data: {
                    "user_id": sponsor
                    , "_token": "{{ csrf_token() }}"
                , }
                , success: function(response) {
                    // alert(response);      
                    if (response != 1) {
                        // alert("hh");
                        $(".submit-btn").prop("disabled", false);
                        $('#' + res_area).html(response).css('color', '#fff').css('font-weight', '800')
                            .css('margin-buttom', '10px');
                    } else {
                        // alert("hi");
                        $(".submit-btn").prop("disabled", true);
                        $('#' + res_area).html("Sponsor ID Not exists!").css('color', 'red').css(
                            'margin-buttom', '10px');
                    }
                }
            });
        });

    </script>




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
