<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="register-div" class="w-100 d-flex justify-content-end">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-2 py-2 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-3 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="row m-0 p-0">
        <div id="menu-bo" class="bg-secondary m-0 col-2">
            @include('partials.menu-bo')
        </div>
        <div class="col-2 ml-5">

        </div>
        <div class="col-8 ml-5">
            @yield('content')
        </div>
    </div>


    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>