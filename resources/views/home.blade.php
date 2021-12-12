@extends('template.main')
@section('content')
<h1 class="my-3">DASHBOARD PAGE</h1>
{{-- <div>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div> --}}

@endsection