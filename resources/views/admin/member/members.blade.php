

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
                                <div class="container-fluid px-4">
                                    <h1 class="mt-4">{{__('admin.All Members')}}</h1>
                                    


                          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                {{__('admin.All Members')}} 
                            </div>
                            <div class="card-body">
                                <table style="width: 100%" id="datatablesSimple">
                                    {{-- <table style="width: auto" class="table"> --}}
                                        <thead>
                                          <tr>
                                            <th scope="col">{{__('admin.ID')}} </th>
                                            <th scope="col">{{__('admin.Name')}} </th>
                                            <th scope="col">{{__('admin.E-Mail')}} </th>

                                            <th style="text-align: center" scope="col" colspan="2">{{__('admin.Edit')}}  </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($users as $user)
                                          <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{Str::limit($user->name,  10, '...') }}</td>
                                            <td>{{Str::limit($user->email,  10, '...') }}  </td>
                                            <td style="text-align: center"> <a href="{{route('admin.edit-member', $user->id )}}"><i class="far fa-edit"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('admin-delete-member', $user->id)}}" onClick="return confirm('{{__('Are you sure ?')}}')"><i class="far fa-trash-alt"></i> </a>  </td>
                                        </tr>
                                        @endforeach
                                     
                                      </tbody>
                                      
                                    </table>
                                </div>
                                <div style="text-align: right; with:100%;">
                                    <a href="{{route('admin.add-member')}}" type="button" class="btn btn-success" >
                                      {{ __('admin.Add Member') }}
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
            
            


