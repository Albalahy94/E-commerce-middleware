

@extends('./admin/layouts/app')


{{-- @section(__('login.Dashboard '), __('Medical Blog | Members '))  --}}
@section("__('login.Dashboard ')" , "{{__('admin/members.Medical Blog | Members')}}") 

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
                                    <h1 class="mt-4">{{__('All Products')}}</h1>
                                    


                          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                {{__(' All Products')}} 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="    width: 100%;">
                                    {{-- <table style="width: auto" class="table"> --}}
                                        <thead>
                                          <tr>
                                            <th scope="col">{{__('.ID')}} </th>
                                            <th scope="col">{{__('Name')}} </th>
                                            <th scope="col">{{__('Description')}} </th>
                                            <th scope="col">{{__('Price')}} </th>
                                            <th scope="col">{{__('Category')}} </th>
                                            <th scope="col">{{__('Gallary')}} </th>

                                            <th style="text-align: center" scope="col" colspan="2">{{__('Edit')}}  </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($products as $Product)
                                          <tr>
                                            <th scope="row">{{$Product->id}}</th>
                                            <td>{{Str::limit($Product->name,  10, '...') }}</td>
                                            <td>{{Str::limit($Product->description,  10, '...') }}  </td>
                                            <td>{{Str::limit($Product->price,  10, '...') }}  </td>
                                            <td>{{Str::limit($Product->category,  10, '...') }}  </td>
                                            <td>  <img width="100px"  height="100px" src="{{asset('images/products/' . $Product->gallary)}}" alt="{{$Product->name}}"></td>
                                              
                                              {{-- {{Str::limit($Product->gallary,  10, '...') }} --}}
                                          <td style="text-align: center"> <a href="{{route('admin.show-product', $Product->id )}}"> <i class="far fa-eye"></i> </a> </td>
                                          <td style="text-align: center"> <a href="{{route('admin.edit-product', $Product->id )}}"><i class="far fa-edit"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('admin.delete-product', $Product->id)}}" onClick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i> </a>  </td>
                                        </tr>
                                        @endforeach
                                     
                                      </tbody>
                                      
                                    </table>
                                </div>
                                <div style="text-align: right; with:100%;">
                                    <a href="{{route('admin.add-product')}}" type="button" class="btn btn-success" >
                                      {{ __('Add Product') }}
                                    </a>

                                </div>
                                
                            {{-- <div style="text-align: center">
                                {{$allposts->onEachSide(5)->links();}}

                            </div> --}}
                            </div>



                            
                    </div>





                    


                </div>
                
                
                
              </div>
              <a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{__('return to dashboard ')}}  </a>
            </div>
            @endsection
            
            


