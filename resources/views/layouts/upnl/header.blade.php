<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard" />
    <meta name="author" content="{{siteName()}}" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{siteName()}} - Dashboard</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('')}}upnl/images/ocean-fav.png" />

    <link href="{{asset('')}}upnl/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('')}}upnl/vendor/nouislider/nouislider.min.css">
    <!-- Style css -->
    <link href="{{asset('')}}upnl/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="{{asset('')}}upnl/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .dlab-demo-panel .dlab-demo-trigger,
        .DZ-theme-btn,
        .at-expanding-share-button-toggle {
            display: none !important;
        }

        #example_length {
            display: none;
        }

        #example_filter {
            display: none;
        }

        #example_paginate {
            display: none;
        }

        .form-control {
            background: #fff;
            border: 0.0625rem solid #d2d2d2;
            padding: 0.3125rem 1.25rem;
            color: #6e6e6e;
            height: 3.5rem;
            border-radius: 0.5rem;
        }

        @media only screen and (max-width: 600px) {
            .gfxlogo {
                display: none;
            }
        }

        @media only screen and (max-width: 767px) {

            /* .hamburger .line {
    background: #fff !important;
}
.nav-control {
    right: -4rem;
}
.header {
   
    background: #2a2a2a;
} */
            .brand-logo img {
                margin-left: 18px;
            }
        }

        [data-sidebar-style="overlay"] .dlabnav .metismenu>li>a {
            font-size: 16px;
            padding: 20px 20px;
            color: #e9e9e9;
            border-radius: 1rem;
            -webkit-transition: all 0.5s;
            -ms-transition: all 0.5s;
            transition: all 0.5s;
        }

        .bg-warning {
            background-color: #03a4ed !important;
        }

        .brand-logo img {
            width: 230px;
        }

        @media only screen and (max-width: 767px) {
            .brand-logo img {
                margin-left: 8px;
                width: 47px;
            }
        }

        .list-group-item {

            color: #ffffff;

        }

        .hamburger {
            display: inline-block;
            left: 0px;
            position: relative;
            top: -1px;
            -webkit-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
            width: 40px;
            z-index: 999;
        }
    </style>
</head>

<body data-typography="cairo" data-theme-version="dark" data-layout="vertical" data-nav-headerbg="color_1" data-headerbg="color_1" data-sidebar-style="full" data-sidebarbg="color_1" data-sidebar-position="fixed" data-header-position="fixed" data-container="wide" direction="ltr" data-primary="color_1" data-new-gr-c-s-check-loaded="14.1250.0" data-gr-ext-installed="">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">S</span>
            <span style="--i:2">H</span>
            <span style="--i:3">E</span>
            <span style="--i:4">T</span>
            <span style="--i:5">K</span>
            <span style="--i:6">R</span>
            <span style="--i:7">A</span>
            <span style="--i:8">N</span>
            <span style="--i:9">T</span>
            <span style="--i:10">I</span>


        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('user.dashboard')}}" class="brand-logo">
                <!-- Desktop Logo -->
                <img src="{{asset('upnl/images/tronfx.png')}}" class="desktop-logo" alt="">

                <!-- Mobile Logo -->
                <img src="{{asset('upnl/images/ocean-fav.png')}}" class="mobile-logo" alt="">
            </a>

            <!-- Hamburger Menu -->
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>

        <style>
            .desktop-logo {
                display: block;
            }

            .mobile-logo {
                display: none;
            }

            @media (max-width: 768px) {
                .desktop-logo {
                    display: none;
                }

                .mobile-logo {
                    display: block;
                }
            }

            @media only screen and (max-width: 575px) {

                .content-body .container-fluid,
                .content-body .container-sm,
                .content-body .container-md,
                .content-body .container-lg,
                .content-body .container-xl,
                .content-body .container-xxl {
                    padding-top: 15px;
                    padding-right: 15px;
                    padding-left: 21px;
                }
            }

            .widget-stat .media>span {
                height: 60px;
                width: 60px;
                border-radius: 50px;
                padding: 6px 12px;
                font-size: 32px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #464a53;
                min-width: 66px;
                margin-top: -37px;
            }
        </style>

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item">
                                <div class="input-group search-area">
                                    <input type="text" class="form-control" placeholder="Search here...">
                                    <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                                </div>
                            </li>

                            <li class="nav-item dropdown notification_dropdown" style="
    margin-right: -16px;
">
                                <a class="nav-link ai-icon" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('')}}upnl/images/profile/pic1.jpg" width="20" alt="" / style="    width: 41px;
    height: 42px;
    border-radius: 50%;
    border: 1px solid;
    padding: 3px;">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="dlab_W_Notification1" class="widget-media dlab-scroll p-3">
                                        <ul class="timeline">
                                            <li>
                                                <div class="timeline-panel" onclick="location.href='{{route('user.profile')}}'">
                                                    <div class="media me-2">
                                                        <i class="flaticon-025-dashboard"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Profile</h6>
                                                        <small class="d-block">Personal Details</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                                    <div class="media me-2 media-info">
                                                        <i class="las la-power-off ms-3 scale5"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Logout</h6>
                                                        <small class="d-block">session Logout</small>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <!--<a class="all-notification text-primary" href="javascript:void(0);">See all notifications <i class="ti-arrow-right"></i></a>-->
                                </div>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-primary d-sm-inline-block d-none">Logout<i class="las la-power-off ms-3 scale5"></i></a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{asset('')}}upnl/images/profile/pic1.jpg" width="20" alt="" />
                            <div class="header-info ms-3">
                                <span class="font-w600 ">Hi,<b>{{Auth::user()->name}}</b></span>
                                <small class="text-end font-w400">{{Auth::user()->email}}</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{route('user.profile')}}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ms-2">Profile </span>
                            </a>
                            <a href="{{route('user.ChangePass')}}" class="dropdown-item ai-icon">
                                <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span class="ms-2">Security </span>
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>

                    <li><a href="{{route('user.dashboard')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-050-info"></i>
                            <span class="nav-text">User Profile</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.profile')}}">Profile</a></li>
                            <li><a href="{{route('user.ChangePass')}}">Security</a></li>
                            <li><a href="{{route('user.BankDetail')}}">Bank Kyc</a></li>

                        </ul>
                    </li>


<!-- 
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Wallet</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.AddFund')}}">Add Fund</a></li>
                            <li><a href="{{route('user.fundHistory')}}">Fund Report</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('user.walletTransfer')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Wallet Transfer</span>
                        </a>
                    </li> -->


                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Activation</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.invest')}}">Topup </a></li>
                            <li><a href="{{route('user.DepositHistory')}}">Topup Report</a></li>
                        </ul>
                    </li>


<!-- 
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">By Self Package</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.boster')}}">By Self Package </a></li>
                            <li><a href="{{route('user.bosterhistory')}}">By Self Package Report</a></li>
                        </ul>
                    </li> -->

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-086-star"></i>
                            <span class="nav-text">My Downline</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.referral-team')}}">Referrals Team</a></li>
                            <li><a href="{{route('user.level-team')}}">Total Team</a></li>

                        </ul>
                    </li>


                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-072-printer"></i>
                            <span class="nav-text">Profit Summary</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.Self_income')}}">CBR Income</a></li>
                            <li><a href="{{route('user.ocenan_income')}}">Fast Track Income </a></li>



                            <li><a href="{{route('user.Direct_Sponsor_Income')}}">Referral Income</a></li>
                            <li><a href="{{route('user.direct_sponor_level')}}">Reward Income</a></li>

                            <li><a href="{{route('user.team_bonanza')}}">Royalty Income</a></li>
                            <li><a href="{{route('user.reward-bonus')}}">Reward Bonus</a></li>


                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Withdrawal</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.withdraw')}}">Withdraw Request</a></li>
                            <li><a href="{{route('user.Withdraw-History')}}">Withdraw Report</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Support</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.GenerateTicket')}}">Generate Ticket</a></li>
                            <li><a href="{{route('user.SupportMessage')}}">Support Message</a></li>

                        </ul>
                    </li>

                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="    margin-left: -16px;" class="ai-icon" aria-expanded="false">
                            <i class="las la-power-off ms-3 scale5"></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>

                </ul>
                <div class="copyright">
                    <p><strong>{{siteName()}}</strong> © 2025 All Rights Reserved</p>
                    <p class="fs-12">Made with <span class="heart"></span> by {{siteName()}}</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->