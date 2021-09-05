

@extends('./admin/layouts/app')


{{-- @section(__('admin.Dashboard '), __('Medical Blog | Members '))  --}}
@section("__('admin.Dashboard ')" , "{{__('admin.Medical Blog | Members')}}") 

@section('content')

<br>
<br>
<br>


<div class="container">
  @if(Session::has('success'))
  <div class="alert alert-success">
  
   {{Session::get('success')}}
    </div>  
            @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                          

                          <div id="layoutSidenav_content">
                            <main>
                                <div class="container-fluid px-6">
                                    <h1 class="mt-4">{{ __('admin.All Orders')}}</h1>
                                    


                          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                {{ __('admin.All Orders')}} 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="    width: 100%;">
                                    {{-- <table style="width: auto" class="table"> --}}
                                        <thead>
                                          <tr>
                                            <th scope="col">  {{__('admin.ID')}} </th>
                                            <th scope="col">  {{__('admin.Title')}} </th>
                                            <th scope="col">  {{__('admin.Delivery Status')}} </th>
                                            <th scope="col">  {{__('admin.Cash Status')}} </th>
                                            <th scope="col">  {{__('admin.Payment Method')}} </th>
                                            <th scope="col">  {{__('admin.Total Price')}} </th>
                                            <th style="text-align: center" scope="col" colspan="3">  {{__('admin.Edit')}}   </th>
                                     
                                            {{-- <th style="text-align: center" scope="col" colspan="2">{{__('Edit')}}  </th> --}}
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($orders as $order)
                                          <tr> <th scope="row">{{$order->id}}</th>
                                            <td>{{Str::limit($order->name,  10, '...') }}</td>
                                            <td>{{Str::limit($order->delivery_status,  10, '...') }}  </td>
                                            <td>{{Str::limit($order->cash_status,  10, '...') }}  </td>
                                            <td>{{Str::limit($order->payment_method,  10, '...') }} </td>
                                            <td>{{Str::limit($order->total_price,  10, '...') }} </td>
                                            <td style="text-align: center"> <a href="{{route('admin.show-order' , $order->id)}}"> <i class="far fa-eye"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('admin.edit-order' , $order->id)}}"> <i class="far fa-edit"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('admin.delete-order' , $order->id)}}" onClick="return confirm('{{__('Are you sure ?')}}')"> <i class="far fa-trash-alt"></i> </a> </td>
                                          
                                            {{-- <td>  <img width="100px"  height="100px" src="{{asset('images/products/' . $Product->gallary)}}" alt="{{$Product->name}}"></td> --}}
                                              
                                              {{-- {{Str::limit($Product->gallary,  10, '...') }} --}}
                                          {{-- <td style="text-align: center"> <a href="{{route('admin.show-order', $order->id )}}"> <i class="far fa-eye"></i> </a> </td>
                                          <td style="text-align: center"> <a href="{{route('admin.edit-order', $order->id )}}"><i class="far fa-edit"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('admin.delete-order', $order->id)}}" onClick="return confirm('{{__('Are you sure ?')}}')"><i class="far fa-trash-alt"></i> </a>  </td> --}}
                                        </tr>
                                        @endforeach
                                     
                                      </tbody>
                                      
                                    </table>
                                    <div style="text-align: right; with:100%;">
                                        <a href="{{route('admin.add-order')}}" type="button" class="btn btn-success" >
                                          {{ __('admin.Add Order') }}
                                        </a>
    
                                    </div>
                                </div>
                                
                            {{-- <div style="text-align: center">
                                {{$allposts->onEachSide(5)->links();}}

                            </div> --}}
                            
                            <div style="text-align: center">
                              {!! $orders->links() !!}

                          </div>
                        </div>



                            
                    </div>





                    


                </div>
                
              </div>
              <a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{ __('admin.return to dashboard')}}  </a>
            </div>
            @endsection
            
            


