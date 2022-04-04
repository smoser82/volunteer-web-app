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
            <label for="date_start">Date Start:</label>
            <input type="date" id="date_start" name="date_start"><br><br>
            <label for="date_end">Date End:</label>
            <input type="date" id="date_end" name="date_end"><br><br>
            <label for="visibility">Published:</label>
            <input type="checkbox" id="visibility" name="visibility" checked><br><br>
            <label for="contact_name">Contact Name:</label>
            <input type="text" id="contact_name" name="contact_name"><br><br>
            <label for="contact_email">Contact Email:</label>
            <input type="text" id="contact_email" name="contact_email"><br><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>
