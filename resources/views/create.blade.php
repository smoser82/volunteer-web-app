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
        <h1>Create Event</h1>
        <form method = "post" action="{{ route('saveItem') }}" accept_charset="UTF-8">
            {{ csrf_field() }} 
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"><br><br>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description"><br><br>
            <label for="dates">Dates:</label>
            <input type="text" id="dates" name="dates"><br><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>
