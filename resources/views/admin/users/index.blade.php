@extends('template.main')
@section('content')

<div class="row">
    <div class="col-12 mb-4 d-flex align-items-center">
        <h1 class=" @if (LaravelLocalization::getCurrentLocale()=='ar') float-end @else float-start @endif" >{{__('main.users')}}</h1>
        <span class="@if (LaravelLocalization::getCurrentLocale()=='ar') me-auto @else ms-auto @endif">
            <a class=" btn btn-sm btn-success btn-dark" href="{{route('admin.users.create')}}" role="button">Create</a>
        </span>
    </div>
</div>
<div class="card card-dark">
    <table class="table  table-dark text-center ">
        <thead>
          <tr>
            <th scope="col">{{__('main.id')}}</th>
            <th scope="col">{{__('main.name')}}</th>
            <th scope="col">{{__('main.email')}}</th>
            <th scope="col">{{__('main.actions')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary btn-dark" href="{{route('admin.users.edit',$user->id)}}" role="button">{{__('main.edit')}}</a>
                        <button type="button" class="btn btn-sm btn-danger btn-dark" onclick="event.preventDefault() ; document.getElementById('delete-user-form-{{$user->id}}').submit()" >{{__('main.delete')}}</button>
                        <form action="{{route('admin.users.destroy',$user->id)}}"  method="POST" id="delete-user-form-{{$user->id}}" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
        {{$users->links()}}
      </div>

</div>
@endsection
