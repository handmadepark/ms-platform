<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from laravel8.spruko.com/nowa/signin by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Mar 2022 18:53:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Nowa – Laravel Bootstrap 5 Admin & Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin dashboard, admin dashboard laravel, admin panel template, blade template, blade template laravel, bootstrap template, dashboard laravel, laravel admin, laravel admin dashboard, laravel admin panel, laravel admin template, laravel bootstrap admin template, laravel bootstrap template, laravel template"/>

    <!-- Title -->
    <title> Nowa – Laravel Bootstrap 5 Admin & Dashboard Template </title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('admin/img/brand/favicon.png')}}" type="image/x-icon"/>

    <!-- Icons css -->
    <link href="{{asset('admin/plugins/icons/icons.css')}}" rel="stylesheet">

    <!--  bootstrap css-->
    <link href="{{asset('admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!--  Right-sidemenu css -->
    <link href="{{asset('admin/plugins/sidebar/sidebar.css')}}" rel="stylesheet">


    <!-- P-scroll bar css-->
    <link href="{{asset('admin/plugins/perfect-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

    <!--- Style css --->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-transparent.css')}}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{asset('admin/css/skin-modes.css')}}" rel="stylesheet" />



    <!--- Animations css-->
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{asset('admin/switcher/css/switcher.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/switcher/demo.css')}}" rel="stylesheet"/>

</head>
<body class="ltr error-page1">

<!-- Switcher -->
<div class="switcher-wrapper">
    <div class="demo_changer ">
        <div class="form_holder sidebar-right1">
            <div class="row">
                <div class="predefined_styles">
                    <div class="swichermainleft text-center">
                        <div class="p-3 d-grid gap-2">
                            <a href="laravel8.spruko.com/sash.html" class="btn ripple btn-primary mt-0">View Demo</a>
                            <a href="https://themeforest.net/item/nowa-bootstrap-admin-dashboard-html-template/35273899" class="btn ripple btn-success">Buy Now</a>
                            <a href="https://themeforest.net/user/spruko/portfolio" class="btn ripple btn-danger">Our Portfolio</a>
                        </div>
                    </div>
                    <div class="swichermainleft text-center">
                        <h4>LTR AND RTL VERSIONS</h4>
                        <div class="skin-body">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex mt-2">
                                    <span class="me-auto">LTR</span>
                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch25" id="myonoffswitch54" class="onoffswitch2-checkbox" checked>
                                        <label for="myonoffswitch54" class="onoffswitch2-label"></label>
                                    </p>
                                </div>
                                <div class="switch-toggle d-flex mt-2">
                                    <span class="me-auto">RTL</span>
                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch25" id="myonoffswitch55" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch55" class="onoffswitch2-label"></label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>Light Theme Style</h4>
                        <div class="skin-body">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex">
                                    <span class="me-auto">Light Theme</span>
                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch1" id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
                                        <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                    </p>
                                </div>
                                <div class="switch-toggle d-flex mt-2">
                                    <span class="me-auto">Dark Theme</span>
                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch1" id="myonoffswitch2" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>Dark Theme Style</h4>
                        <div class="skin-body">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex">
                                    <span class="me-auto">Light Primary</span>
                                    <div class="">
                                        <input class="wd-25 ht-25 input-color-picker color-primary-light" value="#38cab3" id="colorID" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"  data-id7="transparentcolor"  name="lightPrimary">
                                    </div>
                                </div>
                                <div class="switch-toggle d-flex mt-2">
                                    <span class="me-auto">Dark Primary</span>
                                    <div class="">
                                        <input class="wd-25 ht-25 input-dark-color-picker color-primary-dark" value="#38cab3" id="darkPrimaryColorID" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary"  data-id8="transparentcolor" name="darkPrimary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>Reset All Styles</h4>
                        <div class="skin-body">
                            <div class="switch_section my-4">
                                <button class="btn btn-danger btn-block resetCustomStyles" type="button">Reset All
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Switcher -->


<div class="bg-primary">


    <!-- Loader -->
    <div id="global-loader">
        <img src="{{asset('admin/img/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->


    <div class="square-box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="page" >
        <div class="row">
            <div class="d-flex">
                <a class="demo-icon new nav-link" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs fa-spin" width="24" height="24" viewBox="0 0 24 24"><path d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"></path><path d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"></path></svg>
                </a>
            </div>
        </div>


        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-45 justify-content-center">
                        <div class="card-sigin mt-5 mt-md-0">
                            <!-- Demo content-->
                            <div class="main-card-signin d-md-flex">
                                <div class="wd-100p"><div class="d-flex mb-4"><a href="index-2.html"><img src="{{asset('admin/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a></div>
                                    <div class="">
                                        <div class="main-signup-header">
                                            <h2>Welcome back!</h2>
                                            <h6 class="font-weight-semibold mb-4">Please sign in to continue.</h6>
                                            <div class="panel panel-primary">

                                                <div class="panel-body tabs-menu-body border-0 p-3">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab5">
                                                            <form action="{{route('admin.auth')}}" method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>Email</label> <input class="form-control" placeholder="Enter your email" type="text" name="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="password">
                                                                </div>
                                                                <button class="btn btn-primary btn-block">Sign in</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="main-signin-footer text-center mt-3">
                                                <p><a href="forgot.html" class="mb-3">Forgot password?</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@include('sweetalert::alert')
<!-- JQuery min js -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap js -->
<script src="{{asset('admin/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Ionicons js -->
<script src="{{asset('admin/plugins/ionicons/ionicons.js')}}"></script>

<!-- Moment js -->
<script src="{{asset('admin/plugins/moment/moment.js')}}"></script>

<!-- eva-icons js -->
<script src="{{asset('admin/plugins/eva-icons/eva-icons.min.js')}}"></script>

<!-- generate-otp js -->
<script src="{{asset('admin/js/generate-otp.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>


<!-- generate-otp js -->
<script src="{{asset('admin/js/generate-otp.js')}}"></script>


<!-- THEME-COLOR JS -->
<script src="{{asset('admin/js/themecolor.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('admin/js/custom.js')}}"></script>

<!-- exported JS -->
<script src="{{asset('admin/js/exported.js')}}"></script>

<!-- Switcher js -->
<script src="{{asset('admin/switcher/js/switcher.js')}}"></script>

</body>

<!-- Mirrored from laravel8.spruko.com/nowa/signin by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Mar 2022 18:53:32 GMT -->
</html>
