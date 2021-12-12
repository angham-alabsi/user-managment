@extends('template.main')
@section('content')
<h1 class="mb-4">{{__('main.register')}}</h1>
<div class="card card-dark">
    <form method="POST" action="{{route('user-profile-information.update')}}">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="name" class="form-label">{{__('main.name')}}</label>
        <input type="text" name="name" class="form-control input-dark @error('name') is-invalid @enderror " id="name" aria-describedby="name" value="{{auth()->user()->name}}">
        @error('name')
          <span class="invalid-feedback">
              {{$message}}
          </span>
        @enderror
      </div>

      <div class="mb-3">
          <label for="email" class="form-label">{{__('main.email')}}</label>
          <input type="email" name="email" class="form-control input-dark @error('email') is-invalid @enderror " id="email" aria-describedby="email" value="{{auth()->user()->email}}">
          @error('email')
              <span class="invalid-feedback">
                  {{$message}}
              </span>
          @enderror
      </div>
      <div class="mb-3">
        @php
            $name='name_'.LaravelLocalization::getCurrentLocale()
            @endphp
        @foreach ($roles as $role)
        <div class="form-check">
            <input class="form-check-input input-dark " type="checkbox" name="roles[]" id="{{$role->$name}}"
            value="{{$role->id}} " @isset($user)
                    @if (in_array($role->id , $user->roles->pluck('id')->toArray()))
                        checked
                    @endif
                @endisset>
            <label class="form-check-label" for="{{$role->$name}}">{{$role->$name}}</label>
        </div>
        @endforeach
      </div>

      <div class="mt-5">
          <button type="submit" class="btn btn-primary btn-dark d-block @if (LaravelLocalization::getCurrentLocale()=='ar') me-auto @else ms-auto @endif ">{{__('main.submit')}}</button>
      </div>
    </form>
</div>


@endsection
