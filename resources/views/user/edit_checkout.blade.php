@extends('./user/layouts/app')


@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success">
            
            {{Session::get('success')}}
        </div>  
        @endif
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">{{__('store.Checkout')}}</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">{{__('store.Home')}}</a></li>
                    <li class="active">{{__('store.Checkout')}}</li>
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
        <form action="{{route('cofirmcheckout')}}" method="post">
        @csrf

        <!-- row -->
        <div class="row">

                <div class="col-md-7">


                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">{{__('store.Billing address')}}</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" value="{{$checkouts[0]->first_name}}" type="text" name="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input class="input" value="{{$checkouts[0]->last_name}}"  type="text" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input class="input"  value="{{$checkouts[0]->email}}" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" value="{{$checkouts[0]->address}}"  type="text" name="address" placeholder="Address">
                        </div>
                        {{-- <div class="form-group"> --}}
                            <div class="form-group">
                                <input class="input" value="{{$checkouts[0]->city}}" type="text" name="city" placeholder="City">
                            </div>
                        <div class="form-group">
                            <input class="input" value="{{$checkouts[0]->country}}"  type="text" name="country" placeholder="Country">
                        </div>
                        {{-- <div class="form-group">
                            <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                        </div> --}}
                        <div class="form-group">
                            <input class="input" value="{{$checkouts[0]->tel}}"  type="tel" name="tel" placeholder="Telephone">
                        </div>
                        {{-- <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account">
                                <label for="create-account">
                                    <span></span>
                                    Create Account?
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    
                    <!-- /Billing Details -->

                    <!-- Shiping Details -->
                    {{-- <div class="shiping-details">
                        <div class="section-title">
                            <h3 class="title">Shiping address</h3>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="shiping-address">
                            <label for="shiping-address">
                                <span></span>
                                Ship to a diffrent address?
                            </label>
                            <div class="caption">
                                <div class="form-group">
                                    <input class="input" type="text" name="first-name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="last-name" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="country" placeholder="Country">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="tel" placeholder="Telephone">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /Shiping Details -->

                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea name="notes"  value="{{$checkouts[0]->notes}}" class="input" placeholder="Order Notes"></textarea>
                    </div>
                    <!-- /Order notes -->
            </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">{{__('store.Your Order')}}</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>{{__('store.PRODUCT')}}</strong></div>
                            <div><strong>{{__('store.TOTAL')}}</strong></div>
                        </div>
                        @foreach ($products as $order)
                        <div class="order-products">
                            <div class="order-col">
                                <div>{{$order->name}}</div>
                                <div>{{$order->total_price}}</div>
                            </div>
                        </div>
                        @endforeach
                        <div class="order-col">
                            <div>{{__('store.Shiping')}}</div>
                            <div><strong> <del>100 $</del> {{__('store.FREE')}}</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>{{__('store.TOTAL')}}</strong></div>
                            <div><strong class="order-total"></strong>{{(($order_sum_pending))}}</div>
                        </div>
                    </div>
                 <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" value="1" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                {{__('store.Direct Bank Transfer')}}
                            </label>
                            <div class="caption">
                                <p>{{__('store.Master / VISA')}} </p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" value="2" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                {{__('store.Cheque Payment')}}
                            </label>
                            <div class="caption">
                                <p>{{__('store.Cheque.')}}</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio"value="3" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                {{__('store.Paypal System')}}
                            </label>
                            <div class="caption">
                                <p>{{__('store.Paypal.')}}</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio"value="4" name="payment" id="payment-4">
                            <label for="payment-4">
                                <span></span>
                                {{__('store.Cash On Delivery')}} 
                            </label>
                            <div class="caption">
                                <p>{{__('store.Cash On Delivery.')}}</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" value="5" name="payment" id="payment-5">
                            <label for="payment-5">
                                <span></span>
                                {{__('store.Mobile Cash')}}
                            </label>
                            <div class="caption">
                                <p>{{__('store.Vodafone Cash / Orange Cash / Etisalat Cash.')}}</p>
                            </div>
                        </div>

                    </div>

                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" checked required>
                        <label for="terms">
                            <span></span>
                            {{__('store.I\'ve read and accept the')}} <a href="#">{{__('store.terms & conditions')}}</a>
                        </label>
                    </div>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
                    <button type="submit" class="primary-btn order-submit">{{__('store.Place order')}}</button>
    </form>

        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection
