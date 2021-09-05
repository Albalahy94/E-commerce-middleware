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
							<li class="active">{{__('store.Headphones')}} {{__('store.(  Results)')}}</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">{{__('store.Categories')}}</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										{{__('store.Laptops')}}
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-2">
									<label for="category-2">
										<span></span>
										{{__('store.Smartphones')}}
										<small>(740)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-3">
									<label for="category-3">
										<span></span>
										{{__('store.Cameras')}}
										<small>(1450)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-4">
									<label for="category-4">
										<span></span>
										{{__('store.Accessories')}}
										<small>(578)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-5">
									<label for="category-5">
										<span></span>
										{{__('store.Laptops')}}
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-6">
									<label for="category-6">
										<span></span>
										{{__('store.Smartphones')}}
										<small>(740)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">{{__('store.Price')}}</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">{{__('store.Brand')}}</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										{{__('store.SAMSUNG')}}
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										{{__('store.LG')}}
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										{{__('store.SONY')}}
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										{{__('store.SAMSUNG')}}
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										{{__('store.LG')}}
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										{{__('store.SONY')}}
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							@foreach ( $products as  $product)
							<h3 class="aside-title">{{__('store.Top selling')}}</h3>
							<div class="product-widget">
								<div class="product-img">
									<img  src="{{asset($product->gallary)}}" alt="{{$product->name}}">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $product->category}}</p>
									<h3 class="product-name"><a href="#">{{ $product->name}}</a></h3>
									<h4 class="product-price"> {{ $product->price}}<del class="product-old-price"> {{ $product->price}}</del></h4>
								</div>
							</div>
							@endforeach

							
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									{{__('store.Sort By')}}:
									<select class="input-select">
										<option value="0">{{__('store.Popular')}}</option>
										<option value="1">{{__('store.Position')}}</option>
									</select>
								</label>

								<label>
									{{__('store.Show')}}:
									<select class="input-select">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							@foreach ( $products as  $product)

							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="{{asset($product->gallary)}}" alt="{{$product->name}}">
										<div class="product-label">
											<span class="sale">-10%</span>
											<span class="new">
												{{__('NEW')}}</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">{{ $product->category}}</p>
										<h3 class="product-name"><a href="#">{{ $product->name}} </a></h3>
										<h4 class="product-price">{{ ($product->price) }}  <del class="product-old-price">{{ $product->price}}</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											{{-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> --}}
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

{{-- 
							<div class="clearfix visible-sm visible-xs"></div>

						
							<div class="clearfix visible-lg visible-md"></div>

					
							<div class="clearfix visible-sm visible-xs"></div> --}}

						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">{{__('store.Showing 20-100 products')}}</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

        
@endsection
