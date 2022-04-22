<x-app-layout>
    <x-slot name="header">
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
    </x-slot>

    <x-slot name="slot">
        <div class="center">
            <img src="{{ asset('img/notFound.png') }}" alt="Image of man fishing" style="width:300px;">
            <h1> Oops...Event not found!</h1>
            <button onclick="location.href='/'" type="button">Browse Events</button>
        </div>
    </x-slot>
</x-app-layout>