@extends('./user/layouts/app')

@section('content')


		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">{{__('store.Home')}}</a></li>
							<li><a href="#">{{__('store.All Categories')}}</a></li>
							<li><a href="#">{{__('store.Accessories')}}</a></li>
							<li><a href="#">{{__('store.Headphones')}}</a></li>
							<li class="active">{{__('store.Product name goes here')}}</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./img/product01.png" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/product03.png" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/product06.png" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/product08.png" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">

							<div class="product-preview">
								<img src="{{asset('images/products/' . $product->gallary)}}" alt="{{$product->name}}">
							</div>

							<div class="product-preview">
								<img src="{{asset('images/products/' . $product->gallary)}}" alt="{{$product->name}}">
							</div>

							<div class="product-preview">
								<img src="{{asset('images/products/' . $product->gallary)}}" alt="{{$product->name}}">
							</div>

							<div class="product-preview">
								<img src="{{asset('images/products/' . $product->gallary)}}" alt="{{$product->name}}">
							</div>

						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $product->name}}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">{{__('store.10 Review(s) | Add your review')}}</a>
							</div>
							<div>
								<h3 class="product-price"> {{ $product->price}} <del class="product-old-price"> {{ $product->price}}</del></h3>
								<span class="product-available">{{__('store.In Stock')}}</span>
							</div>
							<p>{{__('store.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.')}}</p>

							<div class="product-options">
								<label>
									{{__('store.Size')}}
									<select class="input-select">
										<option value="0">X</option>
										<option value="0">X</option>
									</select>
								</label>
								<label>
									{{__('store.Color')}}
									<select class="input-select">
										<option value="0">{{__('store.Red')}}</option>
										<option value="0">{{__('store.Red')}}</option>
										<option value="0">{{__('store.Red')}}</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									{{__('store.Qty')}}
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>

								<form action="{{route('add-to-cart', $product->id)}}" method="post">
									@csrf
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> {{__('store.add to cart')}}</button>
								</form>
														</div>

							<ul class="product-btns">
								{{-- <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li> --}}
								{{-- <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li> --}}
							</ul>

							<ul class="product-links">
								<li>{{__('store.Category')}}:</li>
								<li><a href="#">{{ $product->category}}</a></li>
							</ul>

							<ul class="product-links">
								<li>{{__('store.Share')}}:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">{{__('store.Description')}}</a></li>
								<li><a data-toggle="tab" href="#tab2">{{__('store.Details')}}</a></li>
								<li><a data-toggle="tab" href="#tab3">{{__('store.Reviews')}} (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')}}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>{{__('store.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')}}</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">{{__('store.John')}}</h5>
															<p class="date">{{__('store.27 DEC 2018, 8:0 PM')}}</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>{{__('store.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua')}}</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">{{__('store.John')}}</h5>
															<p class="date">{{__('store.27 DEC 2018, 8:0 PM')}}</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>{{__('store.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua')}}</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">{{__('store.John')}}</h5>
															<p class="date">{{__('store.27 DEC 2018, 8:0 PM')}}</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>{{__('store.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua')}}</p>
														</div>
													</li>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email">
													<textarea class="input" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>{{__('store.Your Rating')}}: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">{{__('store.Submit')}}</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">{{__('store.Related Products')}}</h3>
						</div>
					</div>

					<!-- product -->
					@foreach ( $products as  $products)

					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img  src="{{asset('images/products/' . $products->gallary)}}" alt="{{$products->name}}">
								<div class="product-label">
									<span class="sale">-10%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">{{ $products->category}}</p>
								<h3 class="product-name"><a href="#">{{ $products->name}}</a></h3>
								<h4 class="product-price">{{ $products->price}} <del class="product-old-price">{{ $products->price}}</del></h4>
								<div class="product-rating">
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
					</div>
					@endforeach

					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->



@endsection
