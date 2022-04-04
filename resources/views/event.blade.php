<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Volunteering</title>

        <!-- Icon stylesheet -->
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

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
        <a href="/" class="back-button"><span class="mdi mdi-arrow-left"></span> Back To Event List</a>
        <h1> {{ $event->title }} </h1>
        <hr>
        <h3> <i class="mdi mdi-calendar-range"></i> Date and Time</h3>
        <p>{{ $event->dates }} </p>
        <h3> <i class="mdi mdi-text"></i> Description</h3>
        <p>{{ $event->description }} </p>
        <h3><i class="mdi mdi-account-box-outline"></i> Contact Information</h3>
        <p>&ltContact Name&gt <!-- {{ $event->nameContact }} --> at &lt<a href="mailto:temp@abc.com">Contact Email</a>&gt<!-- <a href="mailto:{{ $event->emailContact }}>"{{ $event->emailContact }}</a>--></p>
        <!-- Replace text above between "&lt" and "&gt" with the commented sections after they are implemented -->
    </body>
</html>
