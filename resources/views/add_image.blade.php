@extends('layouts.master')

@section('title')
    Add New Image
@endsection

@section('content') 
    
    <form method="POST" action='{{url("dishImage")}}' enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="dish_id" value="{{$dish_id}}">
        <p>
            <input type="file" name="image">
        </p>
        <p>
            <input type="submit" value="Add Image">
        </p>
    </form>
@endsection
