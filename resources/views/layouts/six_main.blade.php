<?php 

if (Auth::user()) {
?>
<!doctype html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Suggestion') }} | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Complete solution to manage a cooperative society in a SMART and EFFICIENT manner, the one-stop application for everything related to society management." name="description" /> 
        <!-- <meta content="Themesbrand" name="author" /> -->
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('kusumgar/Kusumgar-logos_296+86_v_.png') }}">
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('css')
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- App js -->
        <!-- <script src="{{ asset('assets/js/plugin.js') }}"></script> -->
        <style type="text/css">
            .breadcrumb-item+.breadcrumb-item::before {
                float: left;
                padding-right: var(--bs-breadcrumb-item-padding-x);
                color: var(--bs-breadcrumb-divider-color);
                content: var(--bs-breadcrumb-divider, "/");
            }
            .active-menu{
                    background: #666666;
            }
            @media (max-width: 375px) {
                .logo span.logo-sm-t {
                    display: inline-block;
                }
            }
            .logo .logo-sm-t {
                display: none;
            }
        </style>
    </head>

    <body data-topbar="colored" data-layout="horizontal" style="">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            

            <header id="page-topbar" style="background-color: #343A40;">
                <div class="navbar-header" style="max-width: 100%;">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="logo">
                        <span class="logo-sm-t">
                            <img src="{{ asset('kusumgar/Kusumgar-logos_296+86_v_.png') }}" alt="" class="img-fluid">
                        </span>
                        </div>
                        <div class="navbar-brand-box">
                            <a href="{{url('home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('kusumgar/Kusumgar-logos_296+86_v_.png') }}" alt="" class="img-fluid">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('kusumgar/Kusumgar-logos_296+86_v_.png') }}" alt="" class="img-fluid">
                                </span>
                            </a>

                            <a href="{{url('home')}}" class="logo logo-light">
                                
                                <span class="logo-sm">
                                    <img src="{{ asset('kusumgar/Kusumgar-logos_296+86_v_.png') }}" alt="" class="img-fluid">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('kusumgar/Kusumgar-logos_296+86_v_.png') }}" alt="" class="img-fluid">
                                </span>
                            </a>
                        </div>
                        @if(Session::get('app_id') && Session::get('app_id') == 2)
                        <div class="dropdown dropdown-mega d-none d-lg-block ms-2" style="margin-top: 8px;">
                             @role('Super admin')
                                
                                <button type="button" class="btn header-item waves-effect @if (request()->routeIs('ratings*')) active-menu @endif" onclick='window.location.href = "{{url('ratings')}}"'>
                                        <i class="bx bx-home-circle"></i>
                                        <span key="t-dashboards">Rating Master</span>
                                </button>
                                <button type="button" class="btn header-item waves-effect @if (request()->routeIs('month-week-mappings*')) active-menu @endif" onclick='window.location.href = "{{url('month-week-mappings')}}"'>
                                        <i class="bx bx-home-circle"></i>
                                        <span key="t-dashboards">Month Week Mapping</span>
                                </button>
                                <button type="button" class="btn header-item waves-effect @if (request()->routeIs('auditor-mapping*')) active-menu @endif" onclick='window.location.href = "{{url('auditor-mapping')}}"'>
                                        <i class="bx bx-home-circle"></i>
                                        <span key="t-dashboards">Auditor Mapping</span>
                                </button>
                            @endrole
                            @role(['6S Champion','6S Auditor'])
                                <button type="button" class="btn header-item waves-effect @if (request()->routeIs('audit-card*')) active-menu @endif" onclick='window.location.href = "{{url('audit-card')}}"'>
                                        <i class="bx bx-home-circle"></i>
                                        <span key="t-dashboards">Audit Card</span>
                                </button>
                                
                            @endrole
                        </div>
                        @endif
                        <!-- App Search-->
                        <!-- <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form> -->
                        
                    </div>

                    <div class="d-flex">
                        {{--
                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search input">
                                
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>s
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
                                    <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                    <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                    <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                    <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-customize"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                <div class="px-lg-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/github.png" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row no-gutters">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                                <span>Mail Chimp</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/slack.png" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small" key="t-view-all"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="assets/images/users/avatar-3.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">James Lemire</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="assets/images/users/avatar-4.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Salena Layfield</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
                                    </a>
                                </div>
                            </div>
                        </div>
                        --}}

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">
                                    {{ Auth::user()->name }}
                                </span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{route('users.edit',Auth::user()->id)}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <!-- <a class="dropdown-item" href="{{url('password-update')}}"><i class="bx bx-key font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Update Password</span></a> -->
                                <a class="dropdown-item" href="{{url('terms')}}"><i class="bx bx-key font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Terms & Conditions</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        <!-- <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div> -->
            
                    </div>
                </div>
            </header>
            {{-- 
            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                    >
                                        <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Dashboards</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <a href="index.html" class="dropdown-item" key="t-default">Default</a>
                                        <a href="dashboard-saas.html" class="dropdown-item" key="t-saas">Saas</a>
                                        <a href="dashboard-crypto.html" class="dropdown-item" key="t-crypto">Crypto</a>
                                        <a href="dashboard-blog.html" class="dropdown-item" key="t-blog">Blog</a>
                                        <a href="dashboard-job.html" class="dropdown-item" key="t-Jobs">Jobs</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                    >
                                        <i class="bx bx-tone me-2"></i>
                                        <span key="t-ui-elements"> UI Elements</span> 
                                        <div class="arrow-down"></div>
                                    </a>

                                    <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                        aria-labelledby="topnav-uielement">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-alerts.html" class="dropdown-item" key="t-alerts">Alerts</a>
                                                    <a href="ui-buttons.html" class="dropdown-item" key="t-buttons">Buttons</a>
                                                    <a href="ui-cards.html" class="dropdown-item" key="t-cards">Cards</a>
                                                    <a href="ui-carousel.html" class="dropdown-item" key="t-carousel">Carousel</a>
                                                    <a href="ui-dropdowns.html" class="dropdown-item" key="t-dropdowns">Dropdowns</a>
                                                    <a href="ui-grid.html" class="dropdown-item" key="t-grid">Grid</a>
                                                    <a href="ui-images.html" class="dropdown-item" key="t-images">Images</a>
                                                    <a href="ui-lightbox.html" class="dropdown-item" key="t-lightbox">Lightbox</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-modals.html" class="dropdown-item" key="t-modals">Modals</a>
                                                    <a href="ui-offcanvas.html" class="dropdown-item" key="t-offcanvas">Offcanvas</a>
                                                    <a href="ui-rangeslider.html" class="dropdown-item" key="t-range-slider">Range Slider</a>
                                                    <a href="ui-session-timeout.html" class="dropdown-item" key="t-session-timeout">Session Timeout</a>
                                                    <a href="ui-progressbars.html" class="dropdown-item" key="t-progress-bars">Progress Bars</a>
                                                    <a href="ui-placeholders.html" class="dropdown-item" key="t-placeholders">Placeholders</a>
                                                    <a href="ui-sweet-alert.html" class="dropdown-item" key="t-sweet-alert">Sweet-Alert</a>
                                                    <a href="ui-tabs-accordions.html" class="dropdown-item" key="t-tabs-accordions">Tabs & Accordions</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-typography.html" class="dropdown-item" key="t-typography">Typography</a>
                                                    <a href="ui-toasts.html" class="dropdown-item" key="t-toasts">Toasts</a>
                                                    <a href="ui-video.html" class="dropdown-item" key="t-video">Video</a>
                                                    <a href="ui-general.html" class="dropdown-item" key="t-general">General</a>
                                                    <a href="ui-colors.html" class="dropdown-item" key="t-colors">Colors</a>
                                                    <a href="ui-rating.html" class="dropdown-item" key="t-rating">Rating</a>
                                                    <a href="ui-notifications.html" class="dropdown-item" key="t-notifications">Notifications</a>
                                                    <a href="ui-utilities.html" class="dropdown-item" key="t-utilities">Utilities</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                                    >
                                        <i class="bx bx-customize me-2"></i><span key="t-apps">Apps</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                                role="button">
                                                <span key="t-calendar">Calendar</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                <a href="calendar.html" class="dropdown-item" key="t-tui-calendar">TUI Calendar</a>
                                                <a href="calendar-full.html" class="dropdown-item" key="t-full-calender">Full Calendar</a>
                                            </div>
                                        </div>

                                        <a href="chat.html" class="dropdown-item" key="t-chat">Chat</a>
                                        <a href="apps-filemanager.html" class="dropdown-item" key="t-file-manager">File Manager</a>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                                role="button">
                                                <span key="t-email">Email</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                <a href="email-inbox.html" class="dropdown-item" key="t-inbox">Inbox</a>
                                                <a href="email-read.html" class="dropdown-item" key="t-read-email">Read Email</a>

                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-blog"
                                                        role="button">
                                                        <span key="t-email-templates">Templates</span> <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-blog">
                                                        <a href="email-template-basic.html" class="dropdown-item" key="t-basic-action">Basic Action</a>
                                                        <a href="email-template-alert.html" class="dropdown-item" key="t-alert-email">Alert Email</a>
                                                        <a href="email-template-billing.html" class="dropdown-item" key="t-bill-email">Billing Email</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce"
                                                role="button">
                                                <span key="t-ecommerce">Ecommerce</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                                <a href="ecommerce-products.html" class="dropdown-item" key="t-products">Products</a>
                                                <a href="ecommerce-product-detail.html" class="dropdown-item" key="t-product-detail">Product Detail</a>
                                                <a href="ecommerce-orders.html" class="dropdown-item" key="t-orders">Orders</a>
                                                <a href="ecommerce-customers.html" class="dropdown-item" key="t-customers">Customers</a>
                                                <a href="ecommerce-cart.html" class="dropdown-item" key="t-cart">Cart</a>
                                                <a href="ecommerce-checkout.html" class="dropdown-item" key="t-checkout">Checkout</a>
                                                <a href="ecommerce-shops.html" class="dropdown-item" key="t-shops">Shops</a>
                                                <a href="ecommerce-add-product.html" class="dropdown-item" key="t-add-product">Add Product</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-crypto"
                                                role="button">
                                                <span key="t-crypto">Crypto</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-crypto">
                                                <a href="crypto-wallet.html" class="dropdown-item" key="t-wallet">Wallet</a>
                                                <a href="crypto-buy-sell.html" class="dropdown-item" key="t-buy">Buy/Sell</a>
                                                <a href="crypto-exchange.html" class="dropdown-item" key="t-exchange">Exchange</a>
                                                <a href="crypto-lending.html" class="dropdown-item" key="t-lending">Lending</a>
                                                <a href="crypto-orders.html" class="dropdown-item" key="t-orders">Orders</a>
                                                <a href="crypto-kyc-application.html" class="dropdown-item" key="t-kyc">KYC Application</a>
                                                <a href="crypto-ico-landing.html" class="dropdown-item" key="t-ico">ICO Landing</a>
                                            </div>
                                        </div>
                            
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-project"
                                                role="button">
                                                <span key="t-projects">Projects</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-project">
                                                <a href="projects-grid.html" class="dropdown-item" key="t-p-grid">Projects Grid</a>
                                                <a href="projects-list.html" class="dropdown-item" key="t-p-list">Projects List</a>
                                                <a href="projects-overview.html" class="dropdown-item" key="t-p-overview">Project Overview</a>
                                                <a href="projects-create.html" class="dropdown-item" key="t-create-new">Create New</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-task"
                                                role="button">
                                                <span key="t-tasks">Tasks</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-task">
                                                <a href="tasks-list.html" class="dropdown-item" key="t-task-list">Task List</a>
                                                <a href="tasks-kanban.html" class="dropdown-item" key="t-kanban-board">Kanban Board</a>
                                                <a href="tasks-create.html" class="dropdown-item" key="t-create-task">Create Task</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-contact"
                                                role="button">
                                                <span key="t-contacts">Contacts</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                                <a href="contacts-grid.html" class="dropdown-item" key="t-user-grid">User Grid</a>
                                                <a href="contacts-list.html" class="dropdown-item" key="t-user-list">User List</a>
                                                <a href="contacts-profile.html" class="dropdown-item" key="t-profile">Profile</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-blog"
                                                role="button">
                                                <span key="t-blog">Blog</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-blog">
                                                <a href="blog-list.html" class="dropdown-item" key="t-blog-list">Blog List</a>
                                                <a href="blog-grid.html" class="dropdown-item" key="t-blog-grid">Blog Grid</a>
                                                <a href="blog-details.html" class="dropdown-item" key="t-blog-details">Blog Details</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-jobs" role="button">
                                                <span key="t-jobs">Jobs</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-jobs">
                                                <a href="job-list.html" class="dropdown-item" key="t-job-list">Job List</a>
                                                <a href="job-grid.html" class="dropdown-item" key="t-job-grid">Job Grid</a>
                                                <a href="job-apply.html" class="dropdown-item" key="t-apply-job">Apply Job</a>
                                                <a href="job-details.html" class="dropdown-item" key="t-job-details">Job Details</a>
                                                <a href="job-categories.html" class="dropdown-item" key="t-Jobs-categories">Jobs Categories</a>
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-candidate" role="button">
                                                        <span key="t-candidate">Candidate</span>
                                                        <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-candidate">
                                                        <a href="candidate-list.html" class="dropdown-item" key="t-list">List</a>
                                                        <a href="candidate-overview.html" class="dropdown-item" key="t-overview">Overview</a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                                    >
                                        <i class="bx bx-collection me-2"></i><span key="t-components">Components</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                                role="button">
                                                <span key="t-forms">Forms</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-form">
                                                <a href="form-elements.html" class="dropdown-item" key="t-form-elements">Form Elements</a>
                                                <a href="form-layouts.html" class="dropdown-item" key="t-form-layouts">Form Layouts</a>
                                                <a href="form-validation.html" class="dropdown-item" key="t-form-validation">Form Validation</a>
                                                <a href="form-advanced.html" class="dropdown-item" key="t-form-advanced">Form Advanced</a>
                                                <a href="form-editors.html" class="dropdown-item" key="t-form-editors">Form Editors</a>
                                                <a href="form-uploads.html" class="dropdown-item" key="t-form-upload">Form File Upload</a>
                                                <a href="form-xeditable.html" class="dropdown-item" key="t-form-xeditable">Form Xeditable</a>
                                                <a href="form-repeater.html" class="dropdown-item" key="t-form-repeater">Form Repeater</a>
                                                <a href="form-wizard.html" class="dropdown-item" key="t-form-wizard">Form Wizard</a>
                                                <a href="form-mask.html" class="dropdown-item" key="t-form-mask">Form Mask</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                                role="button">
                                                <span key="t-tables">Tables</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                <a href="tables-basic.html" class="dropdown-item" key="t-basic-tables">Basic Tables</a>
                                                <a href="tables-datatable.html" class="dropdown-item" key="t-data-tables">Data Tables</a>
                                                <a href="tables-responsive.html" class="dropdown-item" key="t-responsive-table">Responsive Table</a>
                                                <a href="tables-editable.html" class="dropdown-item" key="t-editable-table">Editable Table</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                                role="button">
                                                <span key="t-charts">Charts</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                                <a href="charts-apex.html" class="dropdown-item" key="t-apex-charts">Apex charts</a>
                                                <a href="charts-echart.html" class="dropdown-item" key="t-e-charts">E charts</a>
                                                <a href="charts-chartjs.html" class="dropdown-item" key="t-chartjs-charts">Chartjs Charts</a>
                                                <a href="charts-flot.html" class="dropdown-item" key="t-flot-charts">Flot Charts</a>
                                                <a href="charts-tui.html" class="dropdown-item" key="t-ui-charts">Toast UI Charts</a>
                                                <a href="charts-knob.html" class="dropdown-item" key="t-knob-charts">Jquery Knob Charts</a>
                                                <a href="charts-sparkline.html" class="dropdown-item" key="t-sparkline-charts">Sparkline Charts</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icons"
                                                role="button">
                                                <span key="t-icons">Icons</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                                <a href="icons-boxicons.html" class="dropdown-item" key="t-boxicons">Boxicons</a>
                                                <a href="icons-materialdesign.html" class="dropdown-item" key="t-material-design">Material Design</a>
                                                <a href="icons-dripicons.html" class="dropdown-item" key="t-dripicons">Dripicons</a>
                                                <a href="icons-fontawesome.html" class="dropdown-item" key="t-font-awesome">Font awesome</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-map"
                                                role="button">
                                                <span key="t-maps">Maps</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-map">
                                                <a href="maps-google.html" class="dropdown-item" key="t-g-maps">Google Maps</a>
                                                <a href="maps-vector.html" class="dropdown-item" key="t-v-maps">Vector Maps</a>
                                                <a href="maps-leaflet.html" class="dropdown-item" key="t-l-maps">Leaflet Maps</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                                    >
                                        <i class="bx bx-file me-2"></i><span key="t-extra-pages">Extra pages</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-more">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-invoice"
                                                role="button">
                                                <span key="t-invoices">Invoices</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-invoice">
                                                <a href="invoices-list.html" class="dropdown-item" key="t-invoice-list">Invoice List</a>
                                                <a href="invoices-detail.html" class="dropdown-item" key="t-invoice-detail">Invoice Detail</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                                role="button">
                                                <span key="t-authentication">Authentication</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                <a href="auth-login.html" class="dropdown-item" key="t-login">Login</a>
                                                <a href="auth-login-2.html" class="dropdown-item" key="t-login-2">Login 2</a>
                                                <a href="auth-register.html" class="dropdown-item" key="t-register">Register</a>
                                                <a href="auth-register-2.html" class="dropdown-item" key="t-register-2">Register 2</a>
                                                <a href="auth-recoverpw.html" class="dropdown-item" key="t-recover-password">Recover Password</a>
                                                <a href="auth-recoverpw-2.html" class="dropdown-item" key="t-recover-password-2">Recover Password 2</a>
                                                <a href="auth-lock-screen.html" class="dropdown-item" key="t-lock-screen">Lock Screen</a>
                                                <a href="auth-lock-screen-2.html" class="dropdown-item" key="t-lock-screen-2">Lock Screen 2</a>
                                                <a href="auth-confirm-mail.html" class="dropdown-item" key="t-confirm-mail">Confirm Mail</a>
                                                <a href="auth-confirm-mail-2.html" class="dropdown-item" key="t-confirm-mail-2">Confirm Mail 2</a>
                                                <a href="auth-email-verification.html" class="dropdown-item" key="t-email-verification">Email verification</a>
                                                <a href="auth-email-verification-2.html" class="dropdown-item" key="t-email-verification-2">Email verification 2</a>
                                                <a href="auth-two-step-verification.html" class="dropdown-item" key="t-two-step-verification">Two step verification</a>
                                                <a href="auth-two-step-verification-2.html" class="dropdown-item" key="t-two-step-verification-2">Two step verification 2</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility"
                                                role="button">
                                                <span key="t-utility">Utility</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                                <a href="pages-starter.html" class="dropdown-item" key="t-starter-page">Starter Page</a>
                                                <a href="pages-maintenance.html" class="dropdown-item" key="t-maintenance">Maintenance</a>
                                                <a href="pages-comingsoon.html" class="dropdown-item" key="t-coming-soon">Coming Soon</a>
                                                <a href="pages-timeline.html" class="dropdown-item" key="t-timeline">Timeline</a>
                                                <a href="pages-faqs.html" class="dropdown-item" key="t-faqs">FAQs</a>
                                                <a href="pages-pricing.html" class="dropdown-item" key="t-pricing">Pricing</a>
                                                <a href="pages-404.html" class="dropdown-item" key="t-error-404">Error 404</a>
                                                <a href="pages-500.html" class="dropdown-item" key="t-error-500">Error 500</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                    >
                                        <i class="bx bx-layout me-2"></i><span key="t-layouts">Layouts</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-layout-verti"
                                                role="button">
                                                <span key="t-vertical">Vertical</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-layout-verti">
                                                <a href="layouts-light-sidebar.html" class="dropdown-item" key="t-light-sidebar">Light Sidebar</a>
                                                <a href="layouts-compact-sidebar.html" class="dropdown-item" key="t-compact-sidebar">Compact Sidebar</a>
                                                <a href="layouts-icon-sidebar.html" class="dropdown-item" key="t-icon-sidebar">Icon Sidebar</a>
                                                <a href="layouts-boxed.html" class="dropdown-item" key="t-boxed-width">Boxed Width</a>
                                                <a href="layouts-preloader.html" class="dropdown-item" key="t-preloader">Preloader</a>
                                                <a href="layouts-colored-sidebar.html" class="dropdown-item" key="t-colored-sidebar">Colored Sidebar</a>
                                                <a href="layouts-scrollable.html" class="dropdown-item" key="t-scrollable">Scrollable</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-layout-hori"
                                                role="button">
                                                <span key="t-horizontal">Horizontal</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-layout-hori">
                                                <a href="layouts-horizontal.html" class="dropdown-item" key="t-horizontal">Horizontal</a>
                                                <a href="layouts-hori-topbar-light.html" class="dropdown-item" key="t-topbar-light">Topbar light</a>
                                                <a href="layouts-hori-boxed-width.html" class="dropdown-item" key="t-boxed-width">Boxed width</a>
                                                <a href="layouts-hori-preloader.html" class="dropdown-item" key="t-preloader">Preloader</a>
                                                <a href="layouts-hori-colored-header.html" class="dropdown-item" key="t-colored-topbar">Colored Header</a>
                                                <a href="layouts-hori-scrollable.html" class="dropdown-item" key="t-scrollable">Scrollable</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            --}}

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content" style="margin-top: 20px;">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">@yield('m2')</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Whoops!</strong> There were some problems with your input.
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 <br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @yield('content')
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
                <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 255</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 145</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Shipping:</h6>
                                                </td>
                                                <td>
                                                    Free
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Kusumgar Private Limited.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Developed & Managed By 
                                    <a href="http://www.sanchitsolutions.com/" target="_blank">Sanchit Solutions</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            

        </div>
        <!-- END layout-wrapper -->

        

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- dashboard init -->
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
        @yield('js')
        <!-- App js -->
        <!-- form advanced init -->
        <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        @yield('jss')
    </body>
</html>
<?php 
}else{
 ?>
<!doctype html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>My Society | SmartCHS</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- App js -->
        <!-- <script src="{{ asset('assets/js/plugin.js') }}"></script> -->

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         <br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to SmartCHS.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                @include('auth.society_login')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        @yield('js')
        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script>
            window.location.href = '/login';
        </script>
    </body>



<?php 
echo "<pre>"; print_r(''); echo "</pre>"; die('');
} ?>
