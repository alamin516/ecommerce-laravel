@extends('layouts.admin-layout')

@section('children')
<div class="grid grid-cols-6 divide-x">
    @foreach ($products as $product)
    <img src="{{ asset('upload/' . basename($product->image)) }}" alt="{{$product->title}}">
    @endforeach
</div>
@endsection