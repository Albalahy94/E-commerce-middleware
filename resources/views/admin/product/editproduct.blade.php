@extends('./admin/layouts/app')


{{-- @section(__('login.Dashboard '), __('Medical Blog | Members '))  --}}
@section("__('login.Dashboard ')" , "{{ __('admin.Edit Product')}}")

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
          
          
          <form method="post" action="{{route('admin.update-product',$product->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
    <div class="mb-3">
        <label for="" class="form-label"> {{ __('admin.Name')}} </label>
        <input style="text-align: center" value="{{$product->name}}" type="text" name="name" class="form-control" id="" >
      </div>
        @if ($errors->any())
        @error('name')
        <div class="alert alert-danger">
            {{$message}}
          </div>
      @enderror
    @endif

      <div class="mb-3">
        <label for="" class="form-label">  {{ __('admin.Description')}}</label>
        <input style="text-align: center" value="{{$product->description}}" type="text" name="description" class="form-control" id="" >
      </div>
       @if ($errors->any())
      @error('description')
      <div class="alert alert-danger">
          {{$message}}
        </div>
        @enderror
  @endif

      <div class="mb-3">
        <label for="" class="form-label">  {{ __('admin.Price')}} </label>
        <input style="text-align: center" value="{{$product->price}}"  type="text" name="price" class="form-control" id="" >
   </div>
      @if ($errors->any())
      @error('price')
      <div class="alert alert-danger">
          {{$message}}
        </div>
    @enderror
  @endif

      <div class="mb-3">
        <label for="" class="form-label"> {{ __('admin.category')}} </label>
        <input style="text-align: center" value="{{$product->category}}" type="text" name="category" class="form-control" id="" >
    </div>
      @if ($errors->any())
      <div class="alert alert-danger">
        @error('category')
          {{$message}}
          @enderror
        </div>
  @endif

  
  <div class="mb-3">
    <label for="photo" class="form-label"> {{ __('admin.Photo')}}  </label>
    <input   type="file" name="gallary" class="form-control" id="photo" >

    <label for="photo" class="form-label"> {{ __('admin.Old photo')}}  </label> <br>
   <div style="text-align: center">
    <td> <img width="500px"  height="500px" src="{{asset('images/products/' . $product->gallary)}}" alt="{{$product->name}}"> </td>
  </div>
</div>
  @if ($errors->any())
  <div class="alert alert-danger">
    @error('gallary')
      {{$message}}
      @enderror
    </div>
@endif


  <button type="submit"  class="btn btn-success" > {{ __('admin.Update')}}  </button>
</div>
  </form>


            </div>
            
          </div>
          <a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{ __('admin.return to dashboard')}}  </a>
    </div>

    @endsection