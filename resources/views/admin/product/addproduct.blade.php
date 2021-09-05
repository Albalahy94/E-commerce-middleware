

@extends('./admin/layouts/app')


{{-- @section(__('admin.Dashboard '), __('Medical Blog | Members '))  --}}
@section("__('admin.Dashboard ')" , "{{ __('admin.Add Product')}}") 

@section('content')

<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('admin.Add Product') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.store-product') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('admin.Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.Product Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" >

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                          <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('admin.Product Price') }}</label>

                          <div class="col-md-6">
                              <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" >

                              @error('price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

          
                      <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('admin.Product Category') }}</label>

                        <div class="col-md-6">
                            <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" >

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                      <label for="gallary" class="col-md-4 col-form-label text-md-right">{{ __('admin.Product gallary') }}</label>

                      <div class="col-md-6">
                          <input id="gallary" type="file" class="form-control @error('gallary') is-invalid @enderror" name="gallary" >

                          @error('gallary')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('admin.Add Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <a class="btn btn-dark" href="{{route('Admin.dashboard')}}">  {{ __('admin.return to dashboard')}}  </a>
</div>
@endsection
