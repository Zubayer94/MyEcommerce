<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Kute Shop is new Html theme that we have designed to help you transform your store into a beautiful online showroom. This is a fully responsive Html theme, with multiple versions for homepage and multiple templates for sub pages as well" />
	<meta name="keywords" content="Kute Shop,7uptheme" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name='revisit-after' content='1 days' />
	<title>MyEcommurse | Home</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/bootstrap-theme.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/jquery.fancybox.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/jquery-ui.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/owl.carousel.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/owl.transitions.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/owl.theme.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/jquery.mCustomScrollbar.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/animate.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/libs/hover.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/color-red.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/theme.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/responsive.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/UI/frontend/kuteshop/')}}/css/browser.css" media="all"/>
	<!-- <link rel="stylesheet" type="text/css" href="css/rtl.css" media="all"/> -->
	@section('libcss')
    @show
</head>
<body style="background:#fff">
<div class="wrap">
    <div class="header">

        <!-- Top Header starts -->
        @include('frontend.partial.headerTop')
        <!-- End Top Header -->


        <!-- Main Header starts -->
        @include('frontend.partial.headerMain')
        <!-- End Main Header -->
    </div>
	<!-- End Header -->

	<!-- index content -->
	@section('content')
    @show
    <!-- End Content -->
    
    <!-- footer ends -->
	@include('frontend.partial.footer')
	<!-- End Footer -->
	<a href="#" class="radius scroll-top style1"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
{{-- <script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/ajax googleapis jquery.min.js"></script> --}}
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/owl.carousel.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/jquery.jcarousellite.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/libs/wow.js"></script>
<script type="text/javascript" src="{{asset('/UI/frontend/kuteshop/')}}/js/theme.js"></script>
@section('libjs')
@show

</body>
</html>





    {{-- @include('frontend.partial.navbar')
    

    @section('content')
    @show

    @include('frontend.partial.footer') --}}


