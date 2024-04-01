@extends('layouts.master')

@section('title')
    Order Successful
@endsection

@section('content') 
    <h1>Order Successful</h1>
    <h3>The order for {{$dish->name}} has been placed.</h3>
    @if(($dish->discount)==NULL)
        <h3>The price is ${{$dish->price}}.</h3>
    @else
        <h3>The price is ${{$dish->discounted_price}}.</h3>
    @endif
    <h3>It will be delivered to {{$customer->address}}.</h3>

    
    <a href='{{url("user")}}'>Start New Order</a>
@endsection
