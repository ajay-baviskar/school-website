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
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('css')
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />


        {{-- survey js cdn--}}
        <link  href="https://unpkg.com/survey-core/defaultV2.min.css" type="text/css" rel="stylesheet">
        <script src="https://unpkg.com/survey-core/survey.core.min.js"></script>
        <script src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>

        <!-- (Optional) Predefined theme configurations -->
        <script src="https://unpkg.com/survey-core/themes/index.min.js"></script>
        
        <!-- Survey Creator resources -->
        <link  href="https://unpkg.com/survey-creator-core/survey-creator-core.min.css" type="text/css" rel="stylesheet">
        <script src="https://unpkg.com/survey-creator-core/survey-creator-core.min.js"></script>
        <script src="https://unpkg.com/survey-creator-js/survey-creator-js.min.js"></script>
        {{-- survey js cdn --}}


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
                    background: #343a40;
            }

            /*.logo-sm img,.logo-lg img {
                width: 72%;
                background: white;
            }*/
            
            .logo-sm span,.logo-lg span {
                font-size: 32px;
                font-weight: 600;
                color: white;
                letter-spacing: 9px;
            }
           


        </style>  
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    {{-- <img src="{{ asset('/assets/images/main-logo.png') }}"/> --}}
                                    <span>NUVO</span>
                                    {{-- <img src="{{ asset('logo.webp') }}" alt="" class="img-fluid"> --}}
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('/assets/images/main-logo.png') }}" 
                                      class="header-logo-style" 
                                    />
                                    {{-- <span>NUVO</span>  --}}
                                    {{-- <img src="{{ asset('logo.webp') }}" alt="" class="img-fluid"> --}}
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <span>NUVO</span>
                                    {{-- <img src="{{ asset('logo.webp') }}" alt="" class="img-fluid"> --}}
                                </span>
                                <span class="logo-lg">
                                    <img src="{{url('public')}}/theme/img/sharada_smalllogo-removebg-preview.png"
                                    class="header-logo-style" 
                                    
                                    />
                                    {{-- <img src="{{ asset('logo.webp') }}" alt="" class="img-fluid"> --}}
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>


                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            {{-- 
                            <button class="faq-style-container">
                                <img src="{{ asset('assets/images/brands/notification.png') }}">
                            </button>
                            
                            <button class="faq-style-container">
                                <span>FAQ</span> 
                                <img src="{{ asset('assets/images/companies/faq-image.png') }}">
                            </button>
                            --}}
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
                                <a class="dropdown-item" href="{{route('users.edit',Auth::user()->id)}}?profile=1"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <!-- <a class="dropdown-item" href="{{url('password-update')}}"><i class="bx bx-key font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Update Password</span></a> -->
                                <!-- <a class="dropdown-item" href="{{url('terms')}}"><i class="bx bx-key font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Terms & Conditions</span></a> -->
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
                    <!-- ========== Left Sidebar Start ========== -->
                    <div class="vertical-menu">

                        <div data-simplebar class="h-100">
                            @include('layouts.sidebar')
                        </div>
                </div>
            </header>
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
                
                <!-- end modal -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Corientbs.com.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Developed & Managed By 
                                    <a href="https://corientbs.com/" target="_blank">Corientbs.com</a>
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
