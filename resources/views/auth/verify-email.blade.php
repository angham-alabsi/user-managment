@extends('template')
@section('content')

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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @endif
            <p class="login-card-description">You maust verify your email address, Please check your email for verification link</p>
            <form action="{{ route('verification.send')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-block login-btn mb-4">Resend verification email</button>
                {{-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login"> --}}
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection