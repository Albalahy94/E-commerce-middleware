

@extends('./admin/layouts/app')


{{-- @section(__('login.Dashboard '), __('Medical Blog | Members '))  --}}
@section("__('login.Dashboard ')" , "{{__(' Members')}}") 

@section('content')

<br>
<br>
<br>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              
              <table class="table">
                  <thead>
                      <tr>
                        <th  scope="col" colspan="5">{{__('ID')}} </th>

                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                        <th scope="row">{{$order->id}}</th>
                   
                  </tr>

              </tbody>

                    <thead>
                      <tr>
                        <th  scope="col" colspan="5">{{__('Title')}} </th>
                      

                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                    
                      <td>{{$order->name}}</td>
                     
                  </tr>

              </tbody>

                    <thead>
                      <tr>
                     
                        <th  scope="col" colspan="5" >{{__('Delivery Status')}} </th>
                      

                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                     
                      <td >{{$order->delivery_status}}  </td>
                  
                  </tr>

              </tbody>
                    <thead>
                      <tr>
                    
                        <th  scope="col" colspan="5">{{__('Cash Status')}} </th>
                     

                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                  
                      <td>{{$order->cash_status}}  </td>
                       </tr>

              </tbody>


                    <thead>
                      <tr>
                  
                        <th  scope="col" colspan="5">{{__('Payment Method')}}</th>
                  
                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                        <td>{{$order->payment_method}} </td>
                        </tr>

              </tbody>


              <thead>
                <tr>
            
                  <th  scope="col" colspan="5">{{__('Total Price')}}</th>
            
                </tr>
              </thead>
              <tbody>

                <tr style="text-align: center">
                  <td>{{$order->total_price}} </td>
                  </tr>

        </tbody>

                    <thead>
                      <tr>
                        <th  scope="col"  colspan="5"> {{__('Edit')}} </th>

                      </tr>
                    </thead>
                  <tbody>

                      <tr>
                        <td style="text-align: center"> <a href="{{route('admin.edit-order', $order->id )}}"><i class="far fa-edit"></i> </a> </td>
                          <td style="text-align: center"> <a href="{{route('admin.delete-order', $order->id)}}"  onClick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i> </a>  </td>

                  </tr>

              </tbody>
                </table>



                <a href="{{route('admin.add-order')}}" type="button" class="btn btn-success" >
                  {{ __('Add Product') }}
                </a>
              </div>
          </div>
      </div>
      
    </div>
    <a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{__('return to dashboard ')}}  </a>
</div>
            @endsection
            
            


