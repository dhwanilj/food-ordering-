@extends('layouts.master')

@section('title')
    Top 5 Dishes
@endsection

@section('content') 
    <div class="centre">
        <h1>Top 5 Dishes</h1><br><br>
        <table class="bordered"> 
            <tr><th>Name</th><th>Restaurant</th><th>Orders</th></tr>
            @foreach($top_dishes as $top_dish)
                <tr><td>{{$top_dish->dish_name}}</td><td>{{$top_dish->restaurant_name}}</td><td>{{$top_dish->total_ordered}}</td></tr>
            @endforeach
        </table>
        <br>
        <a href='{{url("user")}}'>Home</a>
    </div>
@endsection