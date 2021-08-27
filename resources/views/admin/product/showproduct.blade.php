

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
                        <th scope="row">{{$product->id}}</th>
                   
                  </tr>

              </tbody>
                    <thead>
                      <tr>
                        <th  scope="col" colspan="5">{{__('Name')}} </th>
                      

                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                    
                      <td>{{$product->name}}</td>
                     
                  </tr>

              </tbody>

                    <thead>
                      <tr>
                     
                        <th  scope="col" colspan="5" >{{__('Description')}} </th>
                      

                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                     
                      <td >{{$product->description}}  </td>
                  
                  </tr>

              </tbody>
                    <thead>
                      <tr>
                    
                        <th  scope="col" colspan="5">{{__('Price')}} </th>
                     

                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                  
                      <td>{{$product->price}}  </td>
                       </tr>

              </tbody>


                    <thead>
                      <tr>
                  
                        <th  scope="col" colspan="5">{{__('Category')}}</th>
                  
                      </tr>
                    </thead>
                    <tbody>

                      <tr style="text-align: center">
                        <td>{{$product->category}} </td>
                        </tr>

              </tbody>


              <thead>
                <tr>
            
                  <th  scope="col" colspan="5">{{__('Photo')}}</th>
            
                </tr>
              </thead>
              <tbody>

                <tr style="text-align: center">
              <td> <img width="500px"  height="500px" src="{{asset('images/products/' . $product->gallary)}}" alt="{{$product->name}}"> </td>
                  </tr>

        </tbody>

                    <thead>
                      <tr>
                        <th  scope="col"  colspan="5"> {{__('Edit')}} </th>

                      </tr>
                    </thead>
                  <tbody>

                      <tr>
                        <td style="text-align: center"> <a href="{{route('admin.edit-product', $product->id )}}"><i class="far fa-edit"></i> </a> </td>
                          <td style="text-align: center"> <a href="{{route('admin.delete-product', $product->id)}}"  onClick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i> </a>  </td>

                  </tr>

              </tbody>
                </table>



                <a href="{{route('admin.add-product')}}" type="button" class="btn btn-success" >
                  {{ __('Add Product') }}
                </a>
              </div>
          </div>
        </div>
        
      </div>
      <a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{__('return to dashboard ')}}  </a>
    </div>
            @endsection
            
            


