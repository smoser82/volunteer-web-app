<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }}
        </h2>
        <a href="/" class="back_button"><span class="mdi mdi-arrow-left"></span> Back To Event List</a>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1> {{ $event->title }} </h1>
                        <hr>
                        <h3> <i class="mdi mdi-calendar-range"></i> Dates</h3>
                        <p>{{ $event->date_start }} to {{ $event->date_end }}</p>
                        <h3> <i class="mdi mdi-text"></i> Description</h3>
                        <p>{{ $event->description }} </p>
                        <h3><i class="mdi mdi-account-box-outline"></i> Contact Information</h3>
                        <p>{{ $event->contact_name }} at &lt<a href="mailto:{{ $event->contact_email }}">{{ $event->contact_email }}</a>&gt</p>

                        @auth
                            <br/><h1>Timeslots:</h1>
                            @foreach ($timeslots as $timeslot)
                                @if ($timeslot->id_user == $Auth::user()->id)
                                    <form method="POST" action="/signup">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $timeslot->id }}" id="id_timeslot" name="id_timeslot">
                                        <div class='card' style="display: flex; justify-content: space-between;">
                                            <p><b>{{ $timeslot->name }}</b> </br>
                                            Timeframe: <span>{{ $timeslot->datetime_start }}</span> to <span>{{ $timeslot->datetime_end }}</span></p>
                                            <x-button class="ml-3" style="float:right;">
                                                {{ __('Sign up') }}
                                            </x-button>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="/removeSignup">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $timeslot->id }}" id="id_timeslot" name="id_timeslot">
                                        <div class='card' style="display: flex; justify-content: space-between;">
                                            <p><b>{{ $timeslot->name }}</b> - SIGNED UP!</br>
                                            Timeframe: <span>{{ $timeslot->datetime_start }}</span> to <span>{{ $timeslot->datetime_end }}</span></p>
                                            <x-button class="ml-3" style="float:right;">
                                                {{ __('Remove signup') }}
                                            </x-button>
                                        </div>
                                    </form>
                                @endif
                            @endforeach

                            @if (Auth::user()->id == $event->id_owner)
                                <form method="POST" action="/removeEvent">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $event->id }}" id="id_event" name="id_event">
                                    <p>You are the owner of this event. Click this button to remove the event.</p>
                                    <x-button style="border: 2px solid black; background-color: red; color: black;">
                                        {{ __('DELETE EVENT') }}
                                    </x-button>
                                </form>
                            @endif
                        @else
                            <br/><h2>Please login to see available timeslots for this event.</h2>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>