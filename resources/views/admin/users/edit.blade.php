@extends('template.main')
@section('content')

<h1 class="mb-3">{{__('main.edit_user')}}</h1>

<div class="card card-dark">
  <form method="POST" action="{{route('admin.users.update',$user->id)}}">
      @method('PATCH')
      @include('admin.users.partials.form')
  </form>
</div>
@endsection
