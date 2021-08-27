

@extends('./admin/layouts/app')


{{-- @section(__('login.Dashboard '), __('Medical Blog | Members '))  --}}
@section("__('login.Dashboard ')" , "{{__(' Add Order')}}") 

@section('content')

<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Order') }}</div>

                <div class="card-body">
                    <form method="POST"  action="{{ route('admin.store-order') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('user ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id"  required autocomplete="name" autofocus>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('Product ID') }}</label>

                            <div class="col-md-6">
                                <input id="product_id" type="number" class="form-control @error('product_id') is-invalid @enderror" name="product_id"  required autocomplete="name" autofocus>

                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="delivery_status" class="col-md-4 col-form-label text-md-right">{{ __('Delivery Status') }}</label>

                            <div class="col-md-6">
                                <input id="delivery_status" type="text" class="form-control @error('delivery_status') is-invalid @enderror" name="delivery_status" >

                                @error('delivery_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cash_status" class="col-md-4 col-form-label text-md-right">{{ __('Cash Status') }}</label>
    
                            <div class="col-md-6">
                                <input id="cash_status" type="text" class="form-control @error('cash_status') is-invalid @enderror" name="cash_status" >
    
                                @error('cash_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                    <div class="form-group row">
                        <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>
  
                        <div class="col-md-6">
                            <input id="payment_method" type="text" class="form-control @error('payment_method') is-invalid @enderror" name="payment_method" >
  
                            @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                        <div class="form-group row">
                          <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Total Price') }}</label>

                          <div class="col-md-6">
                              <input id="total_price" type="number" class="form-control @error('total_price') is-invalid @enderror" name="total_price" >

                              @error('total_price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>



      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Add Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{__('return to dashboard ')}}  </a>
</div>
@endsection
