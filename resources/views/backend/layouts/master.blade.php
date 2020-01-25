<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/UI/backend/matrix-admin/')}}/assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{asset('/UI/backend/matrix-admin/')}}/dist/css/style.min.css" rel="stylesheet">
    
    @section('libcss')
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        @include('backend.partial.top_nav_bar')

        @include('backend.partial.left_panel_tabs')

        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            @section('adminindex')
            @show

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    {{-- <script src="{{asset('/js/jquery-3.4.1.min.js')}}"></script> --}}
    
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    
    <!-- Bootstrap tether Core JavaScript -->

    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{asset('/UI/backend/matrix-admin/')}}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{asset('/UI/backend/matrix-admin/')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('/UI/backend/matrix-admin/')}}/dist/js/custom.min.js"></script>
    <script >
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
    @section('libjs')
    @show

    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    {{-- <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot/excanvas.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot/jquery.flot.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="{{asset('/UI/backend/matrix-admin/')}}/dist/js/pages/chart/chart-page-init.js"></script> --}}

</body>

</html>