	<!-- SECTION -->
    <div id="top" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">{{__('store.Top selling')}}</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                {{-- <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab2">Accessories</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                             
                             
                             		<!-- product -->
										@foreach ( $products as  $product)
										<div class="product">
											<div class="product-img">
												<img src="{{asset($product->gallary)}}" alt="{{$product->name}}">
												<div class="product-label">
													<span class="sale">-10%</span>
													<span class="new">{{__('store.NEW')}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{ __('store'.$product->category)}}</p>
												<h3 class="product-name"><a href="#">{{ $product->name}} </a></h3>
												<h4 class="product-price">{{ ($product->price) }} <del class="product-old-price">{{ $product->price}}</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">{{__('store.add to wishlist')}}</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">{{__('store.add to compare')}}</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">{{__('store.quick view')}}</span></button>
												</div>
											</div>
											<div class="add-to-cart">

                                                <form action="{{route('add-to-cart', $product->id)}}" method="post">
                                                    @csrf
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> {{__('store.add to cart')}}</button>
                                                </form>
                                            											</div>
										</div>
											
										@endforeach
										<!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    