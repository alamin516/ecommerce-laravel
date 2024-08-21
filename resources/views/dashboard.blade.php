@extends('layouts.profile-layout')

@section('content')
    <div class="flex items-center justify-between">
        Hi! @auth 
            @if(Auth::check())
                {{ Auth::user()->name }}
            @endif
        @endauth
    </div>
@endsection