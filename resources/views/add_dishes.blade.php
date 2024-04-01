@extends('layouts.master')

@section('title')
    Add New Dish
@endsection

@section('content') 
    
    <form method="POST" action='{{url("dishes")}}'>
        {{csrf_field()}}
        <br>
        <p><label>Name:</label><input type='text' name='name' value="{{old('name')}}"><br>
        @if(count($errors->get('name'))>0)
        <div class="alert">
            *{{$errors->first('name')}}
        </div>
        @endif
        </p>
        <p><label>Description:</label><input type='text' name='description' value="{{old('description')}}"><br>
        </p>
        <p><label>Price:</label><input type='text' name='price' value="{{old('price')}}"><br>
        @if(count($errors->get('price'))>0)
        <div class ="alert">
            *{{$errors->first('price')}}
        </div>
        @endif
        </p>
        <p>
        <label>Discount:</label><input type='text' name='discount' value="{{old('discount')}}"><br>
        @if(count($errors->get('discount'))>0)
        <div class ="alert">
            *{{$errors->first('discount')}}
        </div>
        @endif
        </p>
        <p>
        <label>Click to add:</label>
        <input type='submit' value='Add'>
        </p>
    </form>
@endsection