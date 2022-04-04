<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Volunteering</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        @include('header')
        <h1>Events</h1>
        <div class="event_list">
        @foreach ($eventList as $event)
            @if($event->visibility == 1)
            <a href="/event/{{ $event->id }}">
                <div class='card'>
                    <p><b>{{ $event->title }}</b> </br>
                    Date(s): {{ $event->date_start }} to {{ $event->date_end }}</p>
                </div>
            </a>
            @endif
        @endforeach
        </div>
    </body>
</html>
