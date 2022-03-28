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
        <h1>Events</h1>
        
        <!-- Uses PHP to get query values -->
        @php
            // Gets the query parameter for sorting, defaulting to title
            $sort = request()->query('sort', 'title');

            // Gets whether the sorting should be ascending or not, defaulting to true
            $asc = request()->query('asc','true');
        @endphp

        <!-- If events should be shown in ascending order -->
        @if($asc === 'true')
            <!-- Sorting buttons -->
            <span class="sort_button" onclick="sort('title')">Title <span class="mdi mdi-arrow-down-bold"></span></span>
            <span class="sort_button" onclick="sort('dates')">Date <span class="mdi mdi-arrow-down-bold"></span></span>
            <div class="event_list">
                <!-- Add each event sorted ascending -->
                @foreach ($eventList->sortBy($sort) as $event)
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

        <!-- If events should be in descending order -->
        @else
            <!-- If being sorted by title -->
            @if($sort === 'title')
                <span class="sort_button" onclick="sort('title')">Title <span class="mdi mdi-arrow-up-bold"></span></span>
                <span class="sort_button" onclick="sort('dates')">Date <span class="mdi mdi-arrow-down-bold"></span></span>
            <!-- If sorted by dates -->
            @elseif($sort === 'dates')
                <span class="sort_button" onclick="sort('title')">Title <span class="mdi mdi-arrow-down-bold"></span></span>
                <span class="sort_button" onclick="sort('dates')">Date <span class="mdi mdi-arrow-up-bold"></span></span>
            @endif
            <div class="event_list">
                <!-- Add each event sorted descending -->
                @foreach ($eventList->sortByDesc($sort) as $event)
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
        @endif
        <script>

            // Whether to be sorted ascending
            var sort_asc = {{ $asc }};

            // Updates either "asc" or "sort" query
            function sort(key) {
                var url = new URL(window.location);
                
                // Already being searched (flip asc)
                if (url.toString().indexOf(key) !== -1) {
                    if (sort_asc === true) {
                        url.searchParams.set("asc", "false");
                    }
                    else {
                        url.searchParams.set("asc", "true");
                    }

                }
                // No sort or being sorted by something else
                else {
                    url.searchParams.set("sort", key);
                       
                }
                // Updates page
                window.location = url;
            }
            
        </script>
    </body>
</html>
