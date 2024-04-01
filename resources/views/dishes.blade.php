@extends('layouts.master')

@section('title')
    {{$restaurant->name}}
@endsection

@section('content') 
    <div class='centre'>
    <h1>{{$restaurant->name}}</h1>
    <h2> Dish List</h2>
    <table class="bordered"> 
        <tr><th>Name</th><th>Description</th><th>Price in $</th><th>Discount in %</th><th>Discounted Price in $</th>
        @if(Auth::check())
            @if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id)
                <th>Edit</th>
            @endif
        @endif
        @if(Auth::check())
            @if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id)
                <th>Delete</th>
            @endif
        @endif
        @if(Auth::check())
            @if(Auth()->user()->role == 'Customer')
            <th>Buy</th>
            @endif
        @endif
        @if(Auth::check())
            @if(Auth()->user()->role == 'Customer')
            <th>Add Favourite</th>
            @endif
        @endif
        @if(Auth::check())
                <th>Add Image</th>
        @endif
    </tr>
        @foreach($dishes as $dish)
            <tr><td><a href='{{url("dishes/$dish->id")}}'>{{$dish->name}}</a></td><td>{{$dish->description}}</td><td>{{$dish->price}}</td><td>{{$dish->discount}}</td><td>{{$dish->discounted_price}}</td>
            @if(Auth::check())
                @if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id)
                    <td><a href='{{url("dishes/$dish->id/edit")}}'>Edit</td>
                @endif
            @endif
            @if(Auth::check())
                @if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id)
                    <td><form method="POST" action='{{url("dishes/$dish->id")}}'>
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" value="Delete">
                    </form></td>
                @endif
            @endif
            @if(Auth::check())
                @if(Auth()->user()->role == 'Customer')
                    <td><form method="POST" action='{{url("order")}}'>
                        {{csrf_field()}}
                        <input type="hidden" name="restaurant_id" value="{{$dish->restaurant_id}}">
                        <input type="hidden" name="dish_id" value="{{$dish->id}}">
                        <input type="submit" value="Buy it Now!">
                    </form></td>
                @endif
            @endif
            @if(Auth::check())
                @if(Auth()->user()->role == 'Customer')
                    <td><form method="POST" action='{{url("favourite")}}'>
                        {{csrf_field()}}
                        <input type="hidden" name="dish_id" value="{{$dish->id}}">
                        <input type="submit" value="Add Favourite">
                    </form></td>
                @endif
            @endif
            @if(Auth::check())
                <td><a href='{{url("dishImage/$dish->id/edit")}}'>Add Image</a></td>
            @endif
        </tr>
        @endforeach
    </table>
    @if(Auth::check())
        @if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id)
            <a href='{{url("dishes/create")}}'>Add New Dish</a>
        @endif
    @endif
    <br>
    <a href='{{url("user")}}'>Home</a>
    </div>
@endsection