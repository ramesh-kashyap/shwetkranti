
<html lang="zxx">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <!-- Page Title -->
    <title>Milkzen - Dairy Farm & Milk HTML Template</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}web-assets/images/favicon.png">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100..800&display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{asset('')}}web-assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{asset('')}}web-assets/css/slicknav.min.css" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{asset('')}}web-assets/css/swiper-bundle.min.css">
    <!-- Font Awesome Icon Css-->
    <link href="{{asset('')}}web-assets/css/all.min.css" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="{{asset('')}}web-assets/css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{asset('')}}web-assets/css/magnific-popup.css">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="{{asset('')}}web-assets/css/mousecursor.css">
    <!-- Main Custom Css -->
    <link href="{{asset('')}}web-assets/css/custom.css" rel="stylesheet" media="screen">
      <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  />
  <style>
    .site-logo {
    height: 90px;
    width: auto;
    object-fit: contain;
}

@media (max-width: 768px) {
    .site-logo {
        height: 55px;
    }
}

@media (max-width: 480px) {
    .site-logo {
        height: 50px;
    }
}

  </style>
</head>

<body>

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{asset('')}}web-assets/images/loader.svg" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="./">
						<img class="site-logo" src="{{asset('')}}web-assets/images/logo3-swetkranti.png"   alt="Logo">
					</a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item "><a class="nav-link" href="{{route('Index')}}">Home</a>
                                   
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('about-us')}}">About Us</a>
                                    <li class="nav-item"><a class="nav-link" href="{{route('services')}}">How It Work</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('blog')}}">Blog</a></li>
                                   
                                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </div>

                        <!-- Header Btn Start -->
                        <div class="header-btn">
                            <a href="contact.html" class="btn-default">Get Started</a>
                        </div>
                        <!-- Header Btn End -->
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>