@extends('layouts.master')

@section('title')
    Orders
@endsection

@section('content') 
    <div class='centre'>
    <h1>Orders</h1>
    <table class="bordered"> 
        <tr><th>Customer</th><th>Address</th><th>Dish</th><th>Date&Time</th></tr>
        @foreach($orders as $order)
            <tr><td>{{$order->customer_name}}</td><td>{{$order->customer_address}}</td><td>{{$order->dish_name}}</td><td>{{$order->created_at}}</td></tr>
        @endforeach 
    </table>
    <a href='{{url("user")}}'>Home</a>
    </div>
@endsection