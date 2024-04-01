@extends('layouts.master')

@section('title')
    Dish Image
@endsection

@section('content')  
    Images<br>
    <h1>{{$dish->name}}</h1>
    @foreach($images as $image)
        <img src="{{url($image->pivot->image)}}"><br>
        
        Name of the uploader:{{$image->name}}<br>
    @endforeach

    <a href='{{url("dishImage/$id/edit")}}'>Add More Images</a>
@endsection
