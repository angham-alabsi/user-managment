@extends('template')
@section('content')

@include('includes.lang')

<div class="container">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-5">
            <div class="login-card-img2"></div>
          {{-- <img src="{{ asset('images/logo.svg') }}" alt="login" class="login-card-img"> --}}
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <div class="brand-wrapper">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo">
            </div>
            <p class="login-card-description">{{__('main.register_account')}}</p>
            <form action="{{ route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="sr-only">{{__('main.userName')}}</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('main.userName')}}" value="{{old('name')}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">{{__('main.email')}}</label>
                  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('main.email')}}" value="{{old('email')}}">
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">{{__('main.password')}}</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('main.password')}}">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="password_confirmation" class="sr-only">{{__('main.confirmation_password')}}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{__('main.confirmation_password')}}">
                </div>
                <button type="submit" class="btn btn-block login-btn mb-4">{{__('main.register')}}</button>
                {{-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Register"> --}}
              </form>
              {{-- <a href="#!" class="forgot-password-link">Forgot password?</a> --}}
              <p class="login-card-footer-text">{{__('main.already_have_account')}}<a href="{{ route('login') }}" class="text-reset">{{__('main.login')}}</a></p>
          </div>
        </div>
      </div>
    </div>
   
  </div>
    
@endsection