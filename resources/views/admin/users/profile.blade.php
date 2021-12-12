@extends('template.main')
@section('content')
<h1>{{__('main.register')}}</h1>

<form method="POST" action="{{route('user-profile-information.update')}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">{{__('main.name')}}</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="name" aria-describedby="name" value="{{auth()->user()->name}}">
      @error('name')
        <span class="invalid-feedback">
            {{$message}}
        </span>
      @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">{{__('main.email')}}</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" aria-describedby="email" value="{{auth()->user()->email}}">
        @error('email')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{__('main.submit')}}</button>
  </form>

@endsection
