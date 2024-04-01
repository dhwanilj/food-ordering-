@extends('layouts.master')

@section('title')
    Applicants
@endsection

@section('content') 
    <table class="bordered"> 
        <tr><th>Name</th><th>Address</th><th>Email</th><th>Approve</th></tr>
        @foreach($restaurants as $restaurant)
            <tr><td>{{$restaurant->name}}</td><td>{{$restaurant->address}}</td><td>{{$restaurant->email}}</td>
            <td>
                <form method='POST' action='{{url("user")}}'>
                    @csrf
                    <input type='hidden' name='id' value='{{$restaurant->id}}'>
                    <input type='hidden' name='name' value='{{$restaurant->name}}'>
                    <input type='hidden' name='address' value='{{$restaurant->address}}'>
                    <input type='hidden' name='email' value='{{$restaurant->email}}'>
                    <input type='hidden' name='role' value='{{$restaurant->role}}'>
                    <input type='hidden' name='password' value='{{$restaurant->password}}'>
                    <input type='submit' value='Approve'>
                </form>
            </td></tr>
        @endforeach
@endsection