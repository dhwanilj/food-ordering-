@extends('layouts.master')

@section('title')
    Home Page
@endsection

@section('content') 
    <div class="centre">
        <h1>Restaurants</h1><br><br>
        @foreach($restaurants as $restaurant)
            <h3><a href='{{url("user/$restaurant->id")}}'>{{$restaurant->name}}</a></h3><br>
        @endforeach
        {{$restaurants->links()}}
    </div>
@endsection