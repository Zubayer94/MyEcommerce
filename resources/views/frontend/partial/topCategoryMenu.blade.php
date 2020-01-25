<!--  Header category menu -->
<div class="col-md-3 hidden-sm hidden-xs">
    <div class="wrap-cat-icon wrap-cat-icon1">
        <h2 class="title14 title-cat-icon">Categories</h2>
        <ul class="list-cat-icon">
            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', 0)->where('category_status',1)->get() as $parent)
            <li class=
            @if ( App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->where('category_status',1)->count() != NULL )
                {{"has-cat-mega"}}
            @endif
            >
                <a href="{{ route('categories.show', $parent->slug) }}"> <img alt="" src="{{asset('images/categories/' . $parent->image )}}"> <span>{{$parent->name}} </span></a>
                <div class="cat-mega-menu cat-mega-style1 " style="width : 300px ; height: 390px;     margin-left: -6px;">
                    <div class="row">
                        <div class="">
                            <div class="list-cat-mega-menu subcat">
                                <ul>
                                    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->where('category_status',1)->get() as $child)
                                <li><a href="{{ route('categories.show', $child->slug) }}"><img alt="{{$child->name}} " style="margin-right: 20px ;" width="25px" height="20px" src="{{asset('images/categories/' . $child->image )}}"><span>{{$child->name}}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="col-md-4 col-sm-3">
                            <div class="list-cat-mega-menu">
                                <h2 class="title-cat-mega-menu">Men’s</h2>
                                <ul>
                                    <li><a href="#">Tops &amp; Tees</a></li>
                                    <li><a href="#">Coats &amp; Jackets</a></li>
                                    <li><a href="#">Underwear</a></li>
                                    <li><a href="#">Shirts</a></li>
                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Pants</a></li>
                                    <li><a href="#">Suits &amp; Blazer</a></li>
                                    <li><a href="#">Shorts</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <div class="banner-image">
                                <a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/home1/cat-mega-thumb.png"></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                

            </li>
            @endforeach


            {{-- <li class="has-cat-mega">
                <a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat2.png"><span>Computers</span></a>
                <div class="cat-mega-menu cat-mega-style2">
                    <h2 class="title-cat-mega-menu">Special products</h2>
                    <div class="row">
                        <div class="col-md-4 col-sm-3">
                            <div class="item-product-ajax item-product first-item">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link">
                                        <img src="{{asset('/UI/frontend/kuteshop/')}}/images/photos/fashion/10.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link plus fancybox.iframe">quick view</a>
                                    <div class="product-extra-link">
                                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                                        <a href="#" class="wishlist-link"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="compare-link"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">new favorite</a></h3>
                                    <div class="product-price">
                                        <del><span>$400.00</span></del>
                                        <ins><span>$360.00</span></ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <div class="item-product-ajax item-product">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link">
                                        <img src="{{asset('/UI/frontend/kuteshop/')}}/images/photos/fashion/3.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link plus fancybox.iframe">quick view</a>
                                    <div class="product-extra-link">
                                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                                        <a href="#" class="wishlist-link"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="compare-link"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">new favorite</a></h3>
                                    <div class="product-price">
                                        <del><span>$400.00</span></del>
                                        <ins><span>$360.00</span></ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <div class="item-product-ajax item-product">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link">
                                        <img src="{{asset('/UI/frontend/kuteshop/')}}/images/photos/fashion/4.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link plus fancybox.iframe">quick view</a>
                                    <div class="product-extra-link">
                                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                                        <a href="#" class="wishlist-link"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="compare-link"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">new favorite</a></h3>
                                    <div class="product-price">
                                        <del><span>$400.00</span></del>
                                        <ins><span>$360.00</span></ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat3.png"><span>Electronics</span></a></li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat4.png"><span>Fashion</span></a></li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat5.png"><span>Footwear</span></a></li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat6.png"><span>Jewelry &amp; Watches</span></a></li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat7.png"><span>Home &amp; Kitchen</span></a></li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat8.png"><span>Home Appliances</span></a></li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat9.png"><span>Beauty &amp; Perfumes</span></a></li>
            <li><a href="#"><img alt="" src="{{asset('/UI/frontend/kuteshop/')}}/images/cat-icon/cat10.png"><span>Sports &amp; Outdoors</span></a></li> --}}
        </ul>
    </div>
</div>
<!-- Header category menu ends -->