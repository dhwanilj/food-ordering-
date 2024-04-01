@extends('layouts.master')

@section('title')
    Favourites
@endsection

@section('content') 
    <h1>Favourites</h1>
    <ol>
        
        @foreach($favourites as $favourite)
            <li>{{$favourite->name}}:{{$favourite->restaurant_id}}</li>
        @endforeach

    </ol>
@endsection
