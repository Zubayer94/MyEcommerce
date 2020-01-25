@extends('frontend.layouts.master')

@section('libcss')
<link rel="stylesheet" type="text/css" href="{{asset('/css/frontend.css')}}">
@endsection

@section('content')
    
    <div class="container" >

        <div class="content-page grid-ajax-infinite">
			<div class="container">
                <!-- Banner -->
				{{-- <div class="banner-shop">
					<div class="banner-shop-thumb">
						<a href="#"><img src="images/shop/bn-grid-ajax.jpg" alt="" /></a>
					</div>
					<div class="banner-shop-info text-center">
						<h2>Best Of London Womenwear</h2>
						<p>Spring/Summer 2016</p>
					</div>
				</div> --}}
				<!-- End Banner -->
				<div class="bread-crumb radius">
					<a href="#">Home</a> <span>Category</span>
				</div>
				<!-- End Bread Crumb -->
				<div class="sort-pagi-bar clearfix">
					<div class="sort-paginav pull-right">
						<div class="sort-bar select-box">
							<label>Sort By:</label>
							<select>
								<option value="">position</option>
								<option value="">price</option>
							</select>
						</div>
						<div class="show-bar select-box">
							<label>Show:</label>
							<select>
								<option value="">20</option>
								<option value="">12</option>
								<option value="">24</option>
							</select>
						</div>
					</div>
                </div>
                <h3 class="text-dark">Showing all products from <span class="text-info"><b>{{$category->name}}</b></span> Category.</h3>
                <!-- End Sort PagiBar -->
                @if ($data == "child")
                    @php
                        $products = $category->products()->paginate(20);
                    @endphp
                @else
                    @php
                        $products = $products1;
                    @endphp
                @endif
                @if ($products->count() == 0)
                    <h4 class="text-danger">Oooops! There is no product in {{$category->name}} Category!</h4>
                @endif
				<ul class="grid-product-ajax list-unstyled clearfix">
                    @foreach ($products as $product)
					<li>
						<div class="item-pro-ajax">
							<div class="product-thumb">
								<div class="product-label">
									<span class="new-label">new</span>
									<span class="sale-label">sale</span>
								</div>
								<a class="product-thumb-link" href="detail.html">
									@php
                                    $i = 0;
                                    @endphp
                                    @foreach ($product->images as $image)
                                    @if ($i < 1)
                                        <img src="{{ asset('images/products/' . $image->image ) }}">
                                    @else
                                        @break;
                                    @endif
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
								</a>
							</div>
							<div class="product-info">
                                <h3 class="product-title"><a href="detail.html"><strong>{{$product->name}}</strong></a></h3>
                                {{-- <p>{{$product->description}}</p> --}}
								<div class="product-price">
									<ins><span>{{$product->price}} TK</span></ins>
                                    {{-- <del><span>$400.00</span></del> --}}
                                    
                                </div>
								{{-- <div class="product-rate">
									<div class="product-rating" style="width:90%"></div>
                                </div> --}}
								<div class="product-extra-link2">
									<a class="addcart-link" href="#">Add to Cart</a>
									<a class="wishlist-link" href="#"><i aria-hidden="true" class="fa fa-heart"></i></a>
								</div>
							</div>
						</div>
                    </li>
                    @endforeach
					<!-- End Item -->
				</ul>
			</div>
        </div>
        
        {{-- laravel pagination --}}
        <div class="float-right">
        {{$products->links()}} 
        </div>

    </div><!-- container.// -->

	
@endsection

@section('libjs')
	
@endsection



{{-- <div class="row" >
        <h3 class="text-dark">Showing all products from <span class="text-info"><b>{{$category->name}}</b></span> Category.</h3>
            <div class="demo">
                @if ($data == "child")
                    @php
                        $products = $category->products()->paginate(1);
                    @endphp
                @else
                    @php
                        $products = $products1;
                    @endphp
                @endif
                @if ($products->count() == 0)
                    <h4 class="text-danger">Oooops! There is no product in {{$category->name}} Category!</h4>
                @endif
                @foreach ($products as $product)
                    <div class="col-md-2 ">
                        <figure class="card card-product">
                            <div class="img-wrap"> 
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($product->images as $image)
                                @if ($i < 1)
                                    <img src="{{ asset('images/products/' . $image->image ) }}">
                                @else
                                    @break;
                                @endif
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </div>
                            <figcaption class="info-wrap">
                            <h4 class="title text-dots"><a href="#"><strong>{{$product->name}} </strong></a></h4>
                                <div class="action-wrap">
                                    <div class="price-wrap h5">
                                        <span class="price-new" style="color: black; font-size: 15px;;"><strong>{{$product->price}}</strong></span>
                                        @if ($product->offer_price != NULL)
                                            <del class="price-old" style="color: #999; margin-left: 10px;">$1980</del> 
                                        @endif
                                        
                                    </div> <!-- price-wrap.// -->
                                    <div class="product-extra-link3">
                                        <a href="#" class="addcart-link">Add to Cart</a>
                                        <a href="#" class="wishlist-link"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                    </div>
                                </div> <!-- action-wrap -->
                            </figcaption>
                        </figure> <!-- card // -->
                    </div> <!-- col // -->
                @endforeach
            </div>
        </div> <!-- row.// --> --}}
