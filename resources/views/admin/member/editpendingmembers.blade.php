
@extends('./admin/layouts/app')

@section("{{__('admin.Dashboard')}}" , "{{__('admin.Medical Blog | Edit Member')}}") 

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
          
          <form method="POST" action="{{route('admin.update-pending-member',$users->id)}}">
            @csrf
            <div class="card">
                <div class="card-header">{{ __('admin.Edit Member') }}</div>

    <div class="mb-3">

        <label for="" class="form-label"> {{__('admin.name')}}</label>
        <input value="{{$users->name}}" type="text" name="name" class="form-control" id="" >
      </div>

      @if ($errors->any())
      @error('name')
      <div class="alert alert-danger">
        {{$message}}
      </div>
          @enderror
  @endif


      <div class="mb-3">
        <label for="" class="form-label"> {{__('admin.email')}}</label>
        
        <input value="{{$users->email}}" type="text" name="email" class="form-control" id=""  >
      </div>

      @if ($errors->any())
      @error('email')
      <div class="alert alert-danger">
          {{$message}}
        </div>
          @enderror
  @endif


  
  <div class="mb-3">
    <label for="" class="form-label"> {{__('admin.Pending')}}</label>
    <input value="{{$users->pending}}" type="number" maxlength="1"  disabled class="form-control" id=""  >
    
  <select  maxlength="1" name="pending" class="form-control"  id="">
    <option value="0">0</option>
    <option value="1">1</option>
  </select>
  </div>

  @if ($errors->any())
  @error('pending')
  <div class="alert alert-danger">
      {{$message}}
    </div>
      @enderror
@endif



  


      
      <button type="submit"  class="btn btn-success">{{__('admin.update')}}</button>
    </div>
  </form>
  
</div>


</div>
<a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{__('admin.return to dashboard')}}  </a>
</div>
@endsection


{{-- 
helllllllllll

@foreach ($posts as $post)
{{$post->id}}
{{$post->name}}
{{$post->description}}
{{$post->tag}}
{{$post->category}}
<br>
@endforeach --}}