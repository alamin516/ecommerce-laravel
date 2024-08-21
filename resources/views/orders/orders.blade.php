@extends('layouts.profile-layout')

@section('content')
    <x-slot name="heading">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <h1>Your Orders</h1>
@endsection
