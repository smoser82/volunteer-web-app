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
        <a href="/" class="back_button"><span class="mdi mdi-arrow-left"></span> Back To Event List</a>
        <h1> {{ $event->title }} </h1>
        <hr>
        <h3> <i class="mdi mdi-calendar-range"></i> Dates</h3>
        <p>{{ $event->date_start }} to {{ $event->date_end }}</p>
        <h3> <i class="mdi mdi-text"></i> Description</h3>
        <p>{{ $event->description }} </p>
        <h3><i class="mdi mdi-account-box-outline"></i> Contact Information</h3>
        <p>{{ $event->contact_name }} at &lt<a href="mailto:{{ $event->contact_email }}">{{ $event->contact_email }}</a>&gt</p>
    </body>
</html>
