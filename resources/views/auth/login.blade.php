@extends('template')

@section('content')

@include('includes.lang');

<div class="container">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-5 ">
            <div class="login-card-img2"></div>
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <div class="brand-wrapper">
              <img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo">
            </div>
            <p class="login-card-description">{{__("main.signin")}}</p>
            <form action="{{ route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="sr-only">{{__("main.email")}}</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__("main.email")}}" value="{{old('email')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="sr-only">{{__("main.password")}}</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__("main.password")}}" >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-block login-btn mb-4">{{__("main.login")}}</button>
                {{-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login"> --}}
              </form>
              <a href="{{ route('password.request' )}}" class="forgot-password-link">{{__("main.forgot_password")}}</a>
              <p class="login-card-footer-text">{{__("main.have_not_account")}} <a href="{{ route('register') }}" class="text-reset">{{__("main.register")}}</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection