<!DOCTYPE html>
<html>
<head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="nav">
        <ul class="navbar">
            <li>Food Delivery</li>
            @auth
                <li>{{Auth::user()->name}}</li>
                <li>{{Auth::user()->role}}</li>
                <form method='POST' action="{{url('/logout')}}">
                    {{csrf_field()}}
                    <li><input type="submit" value="Logout"></li>
                </form>
            @else
                <li><a href ="{{ route('login') }}">Login</a></li>
                <li><a href ="{{ route('register') }}">Register</a></li>
            @endauth
            <li><a href='{{url("user")}}'>Home</a></li>
            @if(Auth::check())
                @if(Auth()->user()->role == 'Restaurant')
                    <td><li><a href='{{url("order")}}'>Orders</a></li></td>
                @endif
            @endif
            @if(Auth::check())
                @if(Auth()->user()->role == 'Customer')
                    <td><li><a href='{{url("favourite")}}'>Favourites</a></li></td>
                @endif
            @endif
            <li><a href='{{url("top_5")}}'>Top 5 Dishes</a></li>
            @if(Auth::check())
                @if(Auth()->user()->role == 'admin')
                    <li><a href='{{url("restaurant_application")}}'>Applicants</a></li>
                @endif
            @endif
            <li><a href='{{url("documentation")}}'>Documentation</a></li>
        </ul>
    </div>
    @yield('content')
</body>
</html>