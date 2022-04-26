<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
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
                            <!-- <label for="visibility">Published:</label>
                            <input type="checkbox" id="visibility" name="visibility" checked><br><br> -->
                            <label for="contact_name">Contact Name:</label>
                            <input type="text" id="contact_name" name="contact_name"><br><br>
                            <label for="contact_email">Contact Email:</label>
                            <input type="text" id="contact_email" name="contact_email"><br><br>
                            <x-button class="ml-3">
                                {{ __('Submit') }}
                            </x-button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>