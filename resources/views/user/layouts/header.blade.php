

<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="tel:01067481561"><i class="fa fa-phone"></i> 010-6748-1567</a></li>
                <li><a href="mailto:sh.elbalahy@gmail.com"><i class="fa fa-envelope-o"></i> sh.elbalahy@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Egypt </a></li>
            </ul>
            <ul class="header-links pull-right">
                <li>
                 <!-- Right Side Of Navbar -->
                 <ul class=" ">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="">
                                <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="">
                                <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a style="    color: #15161D; " class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                                   
                </a></li>
                <li><a href="#"><i class="fa"></i> 
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item ">
                        <a class="nav-link "rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }} 
                        </a>
                    </li> 
                @endforeach
                </a></li>
                {{-- @auth
                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                    
                @endauth --}}

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-2">
                    <div class="header-logo" >
                        <a href="#" class="logo">
                            <a style="color: #ffffff;" class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            {{-- <img src="./img/logo.png" alt=""> --}}
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->
                <!-- SEARCH BAR -->
                <div class="col-md-5">
                    <div class="header-search">
                        <form>
                            {{-- <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select> --}}
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->
 @auth

                <!-- ACCOUNT -->
                <div class="col-md-5 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="/orders">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Orders</span>
                                <div class="qty">{{count($order_pending)}} </div>
                            </a>
                        </div>
                        <!-- /Wishlist -->
                        <!-- finished_orders -->
                        <div>
                            <a href="/finished-orders">
                                <i class="far fa-check-square"></i>
                                <span>Finished </span>
                                <div class="qty">{{count($order_done)}} </div>
                            </a>
                        </div>
                        <!-- /finished_orders -->


                        <!-- checkout -->
                        <div>
                            <a href="/checkout">
                                <i class="far fa-credit-card"></i>
                                <span>Checkout</span>
                            </a>
                        </div>
                        <!-- /checkout -->


                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{count($carts)}}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach ($user_products as $item)
                                        
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('images/products/' . $item->gallary)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$item->name}}</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>{{$item->price}}</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                    @endforeach

                                   
                                </div>
                                <div class="cart-summary">
                                    <small>{{count($carts)}} Item(s) selected</small>
                                    <h5>SUBTOTAL: {{(($cart_sum))}} $ </h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('cart')}}">View Cart</a>
                                    <a href="{{route('checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->
    @endauth

                     
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
