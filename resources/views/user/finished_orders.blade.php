@extends('./user/layouts/app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Admin Login') }}</div> --}}

                <div class="card-body">
                        
                        <div style="
                        text-align: center;
                        font-weight: bolder;
                        font-size: 20px;
                        line-height: 50%;" class="alert alert-success">
                            Total :  {{ $order_sum_done  }}  $
                        
                          </div>  
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">{{__('store.Order ID')}}</th>
                              <th scope="col">{{__('store.Name')}}</th>
                              <th scope="col">{{__('store.Count')}}</th>
                              <th scope="col">{{__('store.Price')}}</th>
                              <th scope="col">{{__('store.Status')}} </th>
                              <th scope="col">{{__('store.Payment Method')}} </th>

                            </tr>
                          </thead>
                          <tbody>
                              
							@foreach ( $order_done as  $i=> $product  ) 
                            {{-- && $carts as $cart --}}
                            <tr>
                              <th scope="row">{{$product->id}}</th>
                              <td>{{ $product->name}}</td>
                              <td>{{ $product->Product_count}}</td>
                              <td>{{ $product->total_price}}</td>
                              <td>{{ $product->delivery_status}}</td>
                              <td>{{ $product->payment_method }} </td>

                            </tr>
							@endforeach
                           
                          </tbody>
                      </table>

                      
                      

                </div>

                <div class="card-body">
                    
                      
                      
                      <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">{{__('store.First Name')}}</th>
                              <th scope="col">{{__('store.Last Name')}}</th>
                              <th scope="col">{{__('store.Email')}}</th>
                              <th scope="col">{{__('store.Address')}} </th>
                              <th scope="col">{{__('store.City')}} </th>
                              <th scope="col">{{__('store.Country')}} </th>
                              <th scope="col">{{__('store.Phone Number')}} </th>
                              <th scope="col">   </th>
                            </tr>
                          </thead>
                          <tbody>
                              
							@foreach ( $checkouts as  $checkout  ) 
                            {{-- && $carts as $cart --}}

                            <tr>
                                <td>{{ $checkout->first_name }} </td>
                                <td> {{ $checkout->last_name }}</td>
                                <td> {{ $checkout->email }}</td>
                                <td> {{ $checkout->address }}</td>
                              <td>{{ $checkout->city }} </td>
                              <td>{{ $checkout->country }} </td>
                              <td>{{ $checkout->tel }} </td>
                              <td></td>
                              
                            </tr>
							@endforeach
                           
                          </tbody>
                      </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
