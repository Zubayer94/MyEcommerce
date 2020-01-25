@extends('frontend.layouts.master')

@section('libcss')
<link rel="stylesheet" type="text/css" href="{{asset('/css/frontend.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/slick-theme.css')}}">
@endsection

@section('content')
    <div id="content">
		<div class="container">
			<div class="content-top1">
				<div class="row">
                    @include('frontend.partial.topCategoryMenu')

                    @include('frontend.partial.slider')
					
				</div>
			</div>
			<!-- End Content Top -->
        </div>

        <!-- Product Hot Deal -->
		{{-- @include('frontend.partial.hotDeals') --}}
        <!-- End Product Hot Deal -->
        <div class="container" >
			
			<div class="row" id = "pro">
				<div class="col-12 product-head" style="">
					<h3 class=" text3">Product</h3>
				</div>
				
				<div class="demo">
					
					@for ($i = 0; $i < 12; $i++)
						<div class="col-md-2 ">
							<figure class="card card-product">
								<div class="img-wrap"> 
									<img src="{{ asset('/images/demo image/hh.jpg') }}">

								</div>
								<figcaption class="info-wrap">
									<h4 class="title text-dots"><a href="#"><strong>Product Name</strong></a></h4>
									<div class="action-wrap">
										{{-- <a href="#" class="btn btn-outline-primary btn-sm float-right"> Order </a>
										<button type="button" class="btn btn-outline-primary">Primary</button> --}}
										<div class="price-wrap h5">
											<span class="price-new" style="color: black; font-size: 15px;;"><strong>$1280</strong></span>
											<del class="price-old" style="color: #999; margin-left: 10px;">$1980</del>
										</div> <!-- price-wrap.// -->
										<div class="product-extra-link3">
											<a href="#" class="addcart-link">Add to Cart</a>
											<a href="#" class="wishlist-link"><i class="fa fa-heart" aria-hidden="true"></i></a>
										</div>
										{{-- <div class="product-rate">
											<div class="product-rating" style="width:90%"></div>
										</div> --}}
									</div> <!-- action-wrap -->
								</figcaption>
							</figure> <!-- card // -->
						</div> <!-- col // -->
					@endfor
				</div>
			</div> <!-- row.// -->

			<div class="row" id = "pro">
				<div class="col-12 product-head" style="">
					<h3 class="text3">Product 2</h3>
				</div>
				<div class="demo">
					
					@for ($i = 0; $i < 12; $i++)
						<div class="col-md-2  ">
							<figure class="card card-product">
								<div class="img-wrap"> 
									<img src="{{ asset('/images/demo image/dd.jpg') }}">

								</div>
								<figcaption class="info-wrap">
									<h4 class="title text-dots"><a href="#"><strong>Product Name {{$i}} </strong></a></h4>
									<div class="action-wrap">
										{{-- <a href="#" class="btn btn-outline-primary btn-sm float-right"> Order </a>
										<button type="button" class="btn btn-outline-primary">Primary</button> --}}
										<div class="price-wrap h5">
											<span class="price-new" style="color: black; font-size: 15px;;"><strong>$1280</strong></span>
											<del class="price-old" style="color: #999; margin-left: 10px;">$1980</del>
										</div> <!-- price-wrap.// -->
										<div class="product-extra-link3">
											<a href="#" class="addcart-link">Add to Cart</a>
											<a href="#" class="wishlist-link"><i class="fa fa-heart" aria-hidden="true"></i></a>
										</div>
										{{-- <div class="product-rate">
											<div class="product-rating" style="width:90%"></div>
										</div> --}}
									</div> <!-- action-wrap -->
								</figcaption>
							</figure> <!-- card // -->
						</div> <!-- col // -->
					@endfor
				</div>
			</div> <!-- row.// -->

			

			{{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				
				<div class="carousel-inner" role="listbox">
					@foreach( $photos as $photo )
					<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
						<img class="d-block img-fluid" src="{{ $photo->image }}" alt="{{ $photo->title }}">
							<div class="carousel-caption d-none d-md-block">
								<h3>{{ $photo->title }}</h3>
								<p>{{ $photo->descriptoin }}</p>
							</div>
					</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div> --}}


			
		</div>
	</div>
@endsection

@section('libjs')
	<script type="text/javascript" src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/slick.js')}}"></script>
	<script>
		$(document).ready(function(){
			$('.demo').slick({
				slidesToShow: 6,
				slidesToScroll: 6,
				autoplay: true,
				autoplaySpeed: 4000,
				arrows: true,
				dots: false,
				pauseOnHover: false,
				// prevArrow: $('.prev'),
    			// nextArrow: $('.next'),
				nextArrow: '<i class="btn btn-warning btn-sm fa fa-chevron-right right-arrow"></i>',
  				prevArrow: '<i class="btn btn-warning btn-sm fa fa-chevron-left left-arrow"></i>',
				responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 3,
					}
				}, {
					breakpoint: 520,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				}]
			});
		});

	</script>
@endsection
