@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Member Details</div>
                  <div class="card-body">
                    <form action="@if(isset($data)){{route('post-edit')}}@else{{route('post-insert')}}@endif" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="@if(isset($data)){{$data['id']}}@endif"/>
                        <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" value="@if(isset($data)){{$data['name']}}@endif" required>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control" name="email" value="@if(isset($data)){{$data['email']}}@endif" required >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="address" class="form-control" name="address" value="@if(isset($data)){{$data['address']}}@endif" required>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('address') }}</span>
                                  @endif
                              </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                    @if (isset($data))
                                        Update
                                    @else
                                        Insert   
                                    @endif    
                              </button>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
 
@endsection
