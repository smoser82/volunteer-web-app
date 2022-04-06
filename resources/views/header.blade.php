<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="header">
            <div class="header_left">
                <img src="{{ asset('img/logo.png') }}" alt="TruLife" style="width:300px;">
            </div>
            <div class="header_right">
                <a href="/">Browse events</a>
                <a href="/my_events">My events</a>
                <a href="/create">Create event</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </body>
</html>