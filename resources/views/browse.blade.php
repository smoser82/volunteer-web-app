<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse Events') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
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
                    </div>
                </div>
            </div>
        </div>
    </x-slot>   
</x-app-layout>