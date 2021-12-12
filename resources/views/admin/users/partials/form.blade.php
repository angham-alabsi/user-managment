@csrf
      <div class="mb-3">
        <label for="name" class="form-label">{{__('main.name')}}</label>
        <input type="text" name="name" class="form-control input-dark @error('name') is-invalid @enderror " id="name" aria-describedby="name" 
        value="{{old('name')}} @isset($user) {{$user->name}} @endisset">
        @error('name')
          <span class="invalid-feedback">
              {{$message}}
          </span>
        @enderror
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">{{__('main.email')}}</label>
          <input type="email" name="email" class="form-control input-dark @error('email') is-invalid @enderror " id="email" aria-describedby="email" 
          value="{{old('email')}} @isset($user){{$user->email}} @endisset">
          @error('email')
              <span class="invalid-feedback">
                  {{$message}}
              </span>
          @enderror
      </div>

      @isset($create)
            <div class="mb-3">
                <label for="password" class="form-label">{{__('main.password')}}</label>
                <input type="password" name="password" class="form-control input-dark @error('password') is-invalid @enderror " id="password">
                @error('password')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{__('main.confirmation_password')}}</label>
                <input type="password" name="password_confirmation" class="form-control input-dark @error('password_confirmation') is-invalid @enderror " id="password_confirmation">
                @error('password_confirmation')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                @enderror
            </div>
      @endisset
      
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
        <button type="submit" class="btn btn-primary btn-dark  d-block @if (LaravelLocalization::getCurrentLocale()=='ar') me-auto @else ms-auto @endif ">{{__('main.submit')}}</button>
      </div>