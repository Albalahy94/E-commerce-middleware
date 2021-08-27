@extends('./user/layouts/app')


@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Admin Login') }}</div> --}}

                <div class="card-body">
                    

                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Order ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Price</th>
                              <th scope="col"  colspan="2">
                

                              </th>
                            </tr>
                          </thead>
                          <tbody>
                              
							@foreach ( $carts as  $i  => $cart  ) 
                            
                            {{-- && $carts as $cart --}}
                            <tr>
                              <th scope="row">{{ $cart ->id}}</th>
                              <td>{{ $cart->name}}</td>
                              <td>{{ $cart->price}}</td>
                              <td>
                                <form action="{{route('add-to-orders',  $cart->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-success"><i class="far fa-check-square"></i> Order Now!</button>
                                </form>  
                              </td>
                              <td>
                                <a class="btn btn-danger" href="{{route('delete-from-cart',  $cart->id)}}" onClick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i>  Delete from cart</a>
  
                              </td>
                            </tr>
							@endforeach
                        </tbody>
                        <div class="container">
                            {{-- <form action="{{}}" method="post"> --}}
                                {{-- @csrf --}}
                                <a href="{{route('add-orders')}}" class="btn btn-success"><i class="far fa-check-square"></i> Order All Now!</a>
                                {{-- <button type="submit" class="btn btn-success"><i class="far fa-check-square"></i> Order All Now!</button> --}}
                            {{-- </form> --}}
                        </div>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
