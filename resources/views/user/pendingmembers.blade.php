

{{-- @extends('./user/layouts/app') --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    	<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

		
</head>
<body>
    
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="tel:01067481561"><i class="fa fa-phone"></i> 010-6748-1567</a></li>
                <li><a href="mailto:sh.elbalahy@gmail.com"><i class="fa fa-envelope-o"></i> sh.elbalahy@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> {{__('store.Egypt')}} </a></li>
            </ul>
            <ul class="header-links pull-right">
                <li>
                 <!-- Right Side Of Navbar -->
                 <ul class=" ">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="">
                                <a class="" href="{{ route('login') }}">{{__('store.Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="">
                                <a class="" href="{{ route('register') }}">{{__('store.Register') }}</a>
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
                                    {{__('store.Logout') }}
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
                <div class="col-md-3">
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
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            {{-- <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select> --}}
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">{{__('store.Search')}}</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->
 @auth

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="/orders">
                                <i class="fa fa-heart-o"></i>
                                <span>{{__('store.Your Orders')}}</span>
                                {{-- <div class="qty">{{count($orders)}} </div> --}}
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>{{__('store.Your Cart')}}</span>
                                {{-- <div class="qty">{{count($carts)}}</div> --}}
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    {{-- @foreach ($user_products as $item)
                                        
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
                                    @endforeach --}}

                                   
                                </div>
                                <div class="cart-summary">
                                    {{-- <small>{{count($carts)}} Item(s) selected</small>
                                    <h5>SUBTOTAL: {{(($cart_sum))}} $ </h5> --}}
                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('cart')}}">{{__('store.View Cart')}}</a>
                                    <a href="{{route('checkout')}}">{{__('store.Checkout')}}  <i class="fa fa-arrow-circle-right"></i></a>
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

<div style="    padding: 40px 0px;" id="app">
    
    <div class="container">
        
        <div>
    

            <div id="layoutError">
                <div id="layoutError_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-center mt-4">
                                        <img width="300px" height="300px"  class="mb-4 img-error" src="{{asset('assets/img/pending.svg')}}" />
                                        <p class="lead">{{__('store.Your requested waiting for admin conformation.')}}</p>
                                        <h3>
                                            {{__('store.Thank you for regestration :) ')}}
                                            
                                            <a href="{{route('home')}}">  {{__('store.return to store')}}
                                        </a></h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                </div>
        </div>
    </div>

</div>
@include('./user/layouts/footer') 

</body>
</html>