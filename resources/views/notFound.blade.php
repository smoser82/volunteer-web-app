<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <x-slot name="slot">
        <div class="center-text">
            <img src="{{ asset('img/notFound.png') }}" alt="Image of man fishing" style="width:300px;" class="center-img">
            <h1> Oops...Event not found!</h1>
            <x-button class="ml-3" onclick="location.href='/'">
                {{ __('Browse Events') }}
            </x-button>
        </div>
    </x-slot>
</x-app-layout>