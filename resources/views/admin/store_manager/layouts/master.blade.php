<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Nowa – Laravel Bootstrap 5 Admin & Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin dashboard, admin dashboard laravel, admin panel template, blade template, blade template laravel, bootstrap template, dashboard laravel, laravel admin, laravel admin dashboard, laravel admin panel, laravel admin template, laravel bootstrap admin template, laravel bootstrap template, laravel template"/>

    <!-- Title -->
    <title>Handmadepark - Admin Dashboard </title>

    <!---Internal Fileupload css-->
	<link href="{{ asset('admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{ asset('admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!-- FAVICON -->
    <link rel="icon" href="{{asset('admin/img/brand/favicon.png')}}" type="image/x-icon"/>

    <!-- ICONS CSS -->
    <link href="{{asset('admin/plugins/icons/icons.css')}}'" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="{{asset('admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- RIGHT-SIDEMENU CSS -->
    <link href="{{asset('admin/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

    <!-- P-SCROLL BAR CSS -->
    <link href="{{asset('admin/plugins/perfect-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

    <!-- Datatables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Internal Select2 css -->
    <link href="{{asset('admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- STYLES CSS -->
    <link href="{{asset('admin/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/style-transparent.css')}}" rel="stylesheet">

    <!-- SKIN-MODES CSS -->
    <link href="{{asset('admin/css/skin-modes.css')}}" rel="stylesheet" />

    <!-- ANIMATION CSS -->
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">

    <!--Tags-->
    <link href="{{asset('admin/plugins/inputtags/inputtags.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('styles')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>

<body class="ltr main-body app sidebar-mini">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('admin/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->

<!-- Page -->
<div class="page">

    <div>

        <!-- main-header -->
    @include('admin.store_manager.layouts.partials.header')
    <!-- /main-header -->

        <!-- main-sidebar -->
    @include('admin.store_manager.layouts.partials.sidebar')
    <!-- main-sidebar -->

    </div>

    <!-- main-content -->

@yield('content')

<!-- main-content closed -->



    <!-- Footer opened -->
@include('admin.layouts.partials.footer')
<!-- Footer closed -->

</div>
<!-- End Page -->

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

@include('sweetalert::alert')


<!-- JQUERY JS -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('admin/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- IONICONS JS -->
<script src="{{asset('admin/plugins/ionicons/ionicons.js')}}"></script>

<!-- MOMENT JS -->
<script src="{{asset('admin/plugins/moment/moment.js')}}"></script>

<!-- P-SCROLL JS -->
<script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

<!-- SIDEBAR JS -->
<script src="{{asset('admin/plugins/side-menu/sidemenu.js')}}"></script>

<!-- STICKY JS -->
<script src="{{asset('admin/js/sticky.js')}}"></script>

<!-- Chart-circle js -->
<script src="{{asset('admin/plugins/circle-progress/circle-progress.min.js')}}"></script>

<!-- RIGHT-SIDEBAR JS -->
<script src="{{asset('admin/plugins/sidebar/sidebar.js')}}"></script>
<script src="{{asset('admin/plugins/sidebar/sidebar-custom.js')}}"></script>

<!-- INTERNAL Apexchart js -->
<script src="{{asset('admin/js/apexcharts.js')}}"></script>

<!--Internal Sparkline js -->
<script src="{{asset('admin/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Moment js -->
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>

<!-- Internal Flot js -->
<script src="{{asset('admin/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>

<!-- Rating js-->
<script src="{{asset('admin/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{asset('admin/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  index js -->
<script src="{{asset('admin/js/index.js')}}"></script>

<!-- EVA-ICONS JS -->
<script src="{{asset('admin/plugins/eva-icons/eva-icons.min.js')}}"></script>

<!-- THEME-COLOR JS -->
<script src="{{asset('admin/js/themecolor.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('admin/js/custom.js')}}"></script>

<!-- exported JS -->
<script src="{{asset('admin/js/exported.js')}}"></script>

<!-- SWITCHER JS -->
<script src="{{asset('admin/switcher/js/switcher.js')}}"></script>

<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin/plugins/inputtags/inputtags.js')}}"></script>

<!-- Internal Select2.min js -->
<script src="{{asset('admin/plugins/select2/js/select2.min.js')}}"></script>

<!-- Internal form-elements js -->
<script src="{{asset('admin/js/form-elements.js')}}"></script>
@yield('scripts')
</body>
</html>
