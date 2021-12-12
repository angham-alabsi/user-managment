<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="USER MANAGEMENT SYSTEM in Laravel 8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{config('app.name','User Management System')}}</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @if (LaravelLocalization::getCurrentLocale() == 'ar') 
            <link rel="stylesheet" href="{{asset('css/rtl.css')}}"> 
        @endif

        <!-- java script -->
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @can('logged-in')
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{__('main.home')}}</a>
                            </li>
                            @can('is-admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.users.index')}}">{{__('main.users')}}</a>
                                </li>
                            @endcan
                            
                        </ul>
                    @endcan
                    
                    <div class="d-flex  @if (LaravelLocalization::getCurrentLocale()=='ar') me-auto @else ms-auto @endif">
                        @if (Route::has('login'))
                            <div class="px-5">
                                @auth
                                    <a class="nav-link-op" href="{{ route('admin.profile') }}">{{__('main.profile')}}</a>
                                    <a class="nav-link-op" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">{{__('main.logout')}}</a>
                                    <form action="{{route('logout')}}" method="POST" id="logout-form" style="display: none">
                                        @csrf
                                    </form>
                                @else
                                    <a class="nav-link-op" href="{{ route('login') }}" class="">{{__('main.login')}}</a>

                                    @if (Route::has('register'))
                                        <a class="nav-link-op" href="{{ route('register') }}" class="">{{__('main.register')}}</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
              </div>
            </div>
        </nav>

        {{-- @can('logged-in')
            <nav class="navbar navbar-expand-lg sub-nav">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">{{__('main.home')}}</a>
                            </li>
                            @can('is-admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.users.index')}}">{{__('main.users')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </nav>
        @endcan --}}

        <main class="container" style="margin-top: 100px;">
            @include('includes.alerts')
            @yield("content")
        </main>
    </body>
</html>
