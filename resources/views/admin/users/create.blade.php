@extends('template.main')
@section('content')

<h1 class="mb-4">{{__('main.create_user')}}</h1>

<div class="card card-dark ">
  <form method="POST" action="{{route('admin.users.store')}}">
      @include('admin.users.partials.form',['create'=>true])
  </form>
</div>
@endsection
