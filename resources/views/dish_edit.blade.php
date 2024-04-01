@extends('layouts.master')

@section('title')
    Edit Dish
@endsection

@section('content') 
    <div class="centre">
        <form method="POST" action='{{url("dishes/$dish->id")}}'>
            {{csrf_field()}}
            {{method_field('PUT')}}
            <p>
                <label>Name:</label><br>
                @if(empty(old('name')))
                    <input type='text' name='name' value="{{$dish->name}}"><br>
                @else
                    <input type='text' name='name' value="{{old('name')}}"><br>
                @endif
                @if(count($errors->get('name'))>0)
                <div class="alert">
                    *{{$errors->first('name')}}
                </div>
                @endif
            </p>
            <p>
                <label>Description:</label><br>
                @if(empty(old('description')))
                    <input type='text' name='description' value="{{$dish->description}}"><br>
                @else
                    <input type='text' name='description' value="{{old('description')}}"><br>
                @endif
            </p>
            <p>
                <label>Price:</label><br>
                @if(empty(old('price')))
                    <input type='text' name='price' value="{{$dish->price}}"><br>
                @else
                    <input type='text' name='price' value="{{old('price')}}"><br>
                @endif
                @if(count($errors->get('price'))>0)
                <div class ="alert">
                    *{{$errors->first('price')}}
                </div>
                @endif
            </p>
            <p>
                <label>Discount:</label><br>
                @if(empty(old('discount')))
                    <input type='text' name='discount' value="{{$dish->discount}}">
                @else
                    <input type='text' name='discount' value="{{old('discount')}}">
                @endif
                @if(count($errors->get('discount'))>0)
                <div class ="alert">
                    *{{$errors->first('discount')}}
                </div>
                @endif
            </p>
            <p>
                <input type='submit' value='Update'>
            </p>
        </form>
    </div>
@endsection