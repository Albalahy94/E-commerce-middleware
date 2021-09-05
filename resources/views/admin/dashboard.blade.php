@extends('./admin/layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Admin Login') }}</div> --}}

                {{-- <div class="card-body"> --}}
                
                    
                      
                
                
                <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    
                    <div class="sb-sidenav-menu">
                        {{-- <div class="nav">
                            <div class="sb-sidenav-menu-heading">{{__('admin.main')}}</div>
                            <a class="nav-link" href="{{url('admin')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{__('login.Dashboard')}}  
                            </a>
                            <div class="sb-sidenav-menu-heading">  {{__('admin.roles')}}</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                 {{__('admin.members')}} 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{('admin.members')}}">  {{__('admin.All Members')}} </a>
                                    <a class="nav-link" href="{{('newmember')}}">  {{__('admin.Add Member')}} </a>
                                    <a class="nav-link" href="{{('admin.pendingmembers')}}">  {{__('admin.Pending Members')}} </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                 {{__('admin.Posts')}}  
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            {{-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        {{__('admin.My Posts')}}   
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{('show')}}">  {{__('Show Posts')}}  </a>
                                            <a class="nav-link" href="{{('newpost')}}">  {{__('Add Post')}} </a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        {{__('admin.All Posts')}}   
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{('show')}}">  {{__('admin.Show Posts')}} </a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> --}}

                    {{-- </div> --}} 
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @if(Session::has('success'))
        
                    <div class="alert alert-success">
                      {{Session::get('success')}}
        
                      </div>  
                              @endif
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">  {{__('admin.Dashboard')}} </h1>
                        
                        {{-- cards --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">  {{__('admin.Products')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div  class="large text-white stretched-link" href="#">{{$products->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div  class="card bg-warning text-white mb-4">
                                    <div class="card-body">  {{__('admin.Pending Members')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="large text-white stretched-link" href="#"> {{$pending_users->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">  {{__('admin.Active Members')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="large text-white stretched-link" href="#">{{$users->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">  {{__('admin.Admins')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="large text-white stretched-link" href="#">{{$admins->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="card mb-4">
                           
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 {{__('admin.Products')}}  
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <table style="width: 100%" class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">  {{__('admin.ID')}} </th>
                                            <th scope="col">  {{__('admin.Title')}} </th>
                                            <th scope="col">  {{__('admin.description')}} </th>
                                            <th scope="col">  {{__('admin.Price')}} </th>
                                            <th scope="col">  {{__('admin.category')}} </th>
                                            <th scope="col">  {{__('admin.Photo')}} </th>
                                            <th style="text-align: center" scope="col" colspan="3">  {{__('admin.Edit')}}   </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($products as $product)
                                          <tr>
                                            <th scope="row">{{$product->id}}</th>
                                            <td>{{Str::limit($product->name,  10, '...') }}</td>
                                            <td>{{Str::limit($product->description,  10, '...') }}  </td>
                                            <td>{{Str::limit($product->price,  10, '...') }}  </td>
                                            <td>{{Str::limit($product->category,  10, '...') }} </td>
                                            <td>  <img width="100px"  height="100px" src="{{asset($product->gallary)}}" alt="{{$product->name}}"></td>
                                                 {{-- {{Str::limit($product->gallary,  10, '...') }}  --}}
                                            <td style="text-align: center"> <a href="{{route('admin.show-product' , $product->id)}}"> <i class="far fa-eye"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('admin.edit-product' , $product->id)}}"> <i class="far fa-edit"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('admin.delete-product' , $product->id)}}" onClick="return confirm('{{__('Are you sure ?')}}')"> <i class="far fa-trash-alt"></i> </a> </td>
                                        </tr>
                                        @endforeach
                                     
                                      </tbody>
                                      
                                    </table>
                                </div>
                                <div style="text-align: right; with:100%;">
                                    <a href="{{url('admin/add-product')}}" type="button" class="btn btn-success" >  {{__('admin.Create New')}} </a>
                                    <a href="{{url('admin/all-products')}}" type="button" class="btn btn-dark" >  {{__('admin.All Products')}} </a>

                                </div>
                                
                            {{-- <div style="text-align: center">
                                {{$allposts->onEachSide(5)->links();}}

                            </div> --}}





                            
                            </div>



                            <div class="card mb-4">
                           
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                     {{__('admin.Members')}}  
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <table style="width: 100%" class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">  {{__('admin.ID')}} </th>
                                                <th scope="col">  {{__('admin.Pending')}} </th>
                                                <th scope="col">  {{__('admin.Name')}} </th>
                                                <th scope="col">  {{__('admin.Email')}} </th>
                                                {{-- <th scope="col">  {{__('admin.category')}} </th>
                                                <th scope="col">  {{__('admin.Photo')}} </th> --}}
                                                <th style="text-align: center" scope="col" colspan="3">  {{__('admin.Edit')}}   </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($users as $user)
                                              <tr>
                                                <th scope="row">{{$user->id}}</th>
                                                <td>{{Str::limit($user->pending,  10, '...') }}</td>
                                                <td>{{Str::limit($user->name,  10, '...') }}  </td>
                                                <td>{{Str::limit($user->email,  10, '...') }}  </td>
                                                {{-- <td>{{Str::limit($user->category,  10, '...') }} </td>
                                                <td>{{Str::limit($user->file,  10, '...') }} </td> --}}
                                                <td style="text-align: center"> <a href="{{route('admin.edit-member', $user->id) }}"> <i class="far fa-edit"></i> </a> </td>
                                                <td style="text-align: center"> <a href="{{route('admin-delete-member', $user->id) }}" onClick="return confirm('{{__('Are you sure ?')}}')"> <i class="far fa-trash-alt"></i> </a> </td>
                                            </tr>
                                            @endforeach
                                         
                                          </tbody>
                                          
                                        </table>
                                    </div>
                                    <div style="text-align: right; with:100%;">
                                        <a href="{{route('admin.add-member')}}" type="button" class="btn btn-success" >  {{__('admin.Create New')}} </a>
                                        <a href="{{route('admin.all-members')}}" type="button" class="btn btn-dark" >  {{__('admin.All Member')}} </a>
    
                                    </div>
                                    
                                {{-- <div style="text-align: center">
                                    {{$allposts->onEachSide(5)->links();}}
    
                                </div> --}}
    
    
    
    
    
                                
                                </div>



                                
                            <div class="card mb-4">
                           
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                     {{__('admin.Pending Members')}}  
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <table style="width: 100%" class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">  {{__('admin.ID')}} </th>
                                                <th scope="col">  {{__('admin.Pending')}} </th>
                                                <th scope="col">  {{__('admin.Name')}} </th>
                                                <th scope="col">  {{__('admin.Email')}} </th>
                                                {{-- <th scope="col">  {{__('admin.category')}} </th>
                                                <th scope="col">  {{__('admin.Photo')}} </th> --}}
                                                <th style="text-align: center" scope="col" colspan="3">  {{__('admin.Edit')}}   </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($pending_users as $pending_user)
                                              <tr>
                                                <th scope="row">{{$pending_user->id}}</th>
                                                <td>{{Str::limit($pending_user->pending,  10, '...') }}</td>
                                                <td>{{Str::limit($pending_user->name,  10, '...') }}  </td>
                                                <td>{{Str::limit($pending_user->email,  10, '...') }}  </td>
                                                {{-- <td>{{Str::limit($user->category,  10, '...') }} </td>
                                                <td>{{Str::limit($user->file,  10, '...') }} </td> --}}
                                                <td style="text-align: center"> <a href="{{route('admin.edit-pending-member', $pending_user->id) }}"> <i class="far fa-edit"></i> </a> </td>
                                                <td style="text-align: center"> <a href="{{route('admin-delete-member', $pending_user->id) }}" onClick="return confirm('{{__('Are you sure ?')}}')"> <i class="far fa-trash-alt"></i> </a> </td>
                                            </tr>
                                            @endforeach
                                         
                                          </tbody>
                                          
                                        </table>
                                    </div>
                                    <div style="text-align: right; with:100%;">
                                        <a href="{{route('admin.add-member')}}" type="button" class="btn btn-success" >  {{__('admin.Create New')}} </a>
                                        <a href="{{route('admin.all-members')}}" type="button" class="btn btn-dark" >  {{__('admin.All Member')}} </a>
    
                                    </div>
                                    
                                {{-- <div style="text-align: center">
                                    {{$allposts->onEachSide(5)->links();}}
    
                                </div> --}}
    
    
    
    
    
                                
                                </div>





                                <div class="card mb-4">
                           
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                         {{__('admin.Orders')}}  
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <table style="width: 100%" class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">  {{__('admin.ID')}} </th>
                                                    <th scope="col">  {{__('admin.Title')}} </th>
                                                    <th scope="col">  {{__('admin.Delivery Status')}} </th>
                                                    <th scope="col">  {{__('admin.Cash Status')}} </th>
                                                    <th scope="col">  {{__('admin.Payment Method')}} </th>
                                                    <th scope="col">  {{__('admin.Total Price')}} </th>
                                                    <th style="text-align: center" scope="col" colspan="3">  {{__('admin.Edit')}}   </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($orders as $order)
                                                  <tr>
                                                    <th scope="row">{{$order->id}}</th>
                                                    <td>{{Str::limit($order->name,  10, '...') }}</td>
                                                    <td>{{Str::limit($order->delivery_status,  10, '...') }}  </td>
                                                    <td>{{Str::limit($order->cash_status,  10, '...') }}  </td>
                                                    <td>{{Str::limit($order->payment_method,  10, '...') }} </td>
                                                    <td>{{Str::limit($order->total_price,  10, '...') }} </td>
                                                    <td style="text-align: center"> <a href="{{route('admin.show-order' , $order->id)}}"> <i class="far fa-eye"></i> </a> </td>
                                                    <td style="text-align: center"> <a href="{{route('admin.edit-order' , $order->id)}}"> <i class="far fa-edit"></i> </a> </td>
                                                    <td style="text-align: center"> <a href="{{route('admin.delete-order' , $order->id)}}" onClick="return confirm('{{__('Are you sure ?')}}')"> <i class="far fa-trash-alt"></i> </a> </td>
                                                </tr>
                                                @endforeach
                                             
                                              </tbody>
                                              
                                            </table>
                                        </div>
                                        <div style="text-align: right; with:100%;">
                                            <a href="{{route('admin.add-order')}}" type="button" class="btn btn-success" >  {{__('admin.Create New')}} </a>
                                            <a href="{{route('admin.all-orders')}}" type="button" class="btn btn-dark" >  {{__('admin.All Orders')}} </a>
        
                                        </div>
                                        
                                    <div style="text-align: center">
                                        {!! $orders->links() !!}
        
                                    </div>
        
        
        
        
        
                                    
                                    </div>




                            
                    </div>




                    
                </main>






                
                {{-- </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
