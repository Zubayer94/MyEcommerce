

<nav class="navbar navbar-expand-md navbar-light bg-light">
    <!-- Brand -->
    <a class="navbar-brand " href={{route('index')}}><img src="{{asset('image\boi.png')}}" width=" 220px" alt="" /></a>
    {{-- <div class="logo pull-left">
        <a class="navbar-brand " href={{route('index')}}><img src="{{asset('image\boi.png')}} alt="" /></a>
    </div> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto header_class">
            <!-- Links -->
            <li class="nav-item active"> <a class="nav-link" href={{route('index')}}>Home</a> </li>
            <li class="nav-item "> <a class="nav-link" href="#">service</a> </li>
            <li class="nav-item "> <a class="nav-link" href="#">about</a> </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Book Catagory </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href=" ">All Products</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            
        </ul>

        <ul class="navbar-nav mx-auto header_class">
            <li class="nav-item dropdown">

                @if (Auth::check())
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="nav-item fa fa-user"></i> {{-- {{Auth::user()->name}} --}}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" href="{{-- {{ route('logout') }} --}}"><i class="fa fa-power-off m-r-5 m-l-5"></i> logout </a>
                    <form id="logout-form" action="{{-- {{ route('logout') }} --}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="#">Profile</a>
                </div>
                @else
                    <a class="nav-link" href="{{-- {{ route('login') }} --}}"><i class="shop fa fa-lock"></i> Login</a>
                @endif
                

            
            </li>
            {{-- <li class="nav-item><a class="nav-link" href=""><i class="nav-item fa fa-user"></i> Account</a></li> --}}
            <li class="nav-item "><a class="nav-link" href=""><i class="shop fa fa-star "></i> Wishlist</a></li>
            <li class="nav-item "><a class="nav-link" href=""><i class="shop fa fa-shopping-cart"></i> Cart</a></li>
            
        </ul>

        <form class="form-inline offset" action="{{-- {{ route('search') }} --}}" method="get">
            <input type="search" name="search" class="form-control mr-sm-2" placeholder="search book" aria-label="search">
            <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
        </form>

    </div>

</nav>
<!--navbar ends here -->