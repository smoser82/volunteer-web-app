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

            $titleSort = "";
            $dateStartSort = "";
            $dateEndSort = "";

            // Sort by title
            if ($sort == 'title') {
                if ($asc === 'true') {
                    $eventList = $eventList->sortBy($sort);
                    $titleSort = "mdi-arrow-up-bold";
                }
                else {
                    $eventList = $eventList->sortByDesc($sort);
                    $titleSort = "mdi-arrow-down-bold";
                }
            }
            // Sort by start date
            else if ($sort == 'date_start'){
                if ($asc === 'true') {
                    $eventList = $eventList->sortBy($sort);
                    $dateStartSort = "mdi-arrow-up-bold";
                }
                else {
                    $eventList = $eventList->sortByDesc($sort);
                    $dateStartSort = "mdi-arrow-down-bold";
                }
            }
            // Sort by end date
            else {
                if ($asc === 'true') {
                    $eventList = $eventList->sortBy($sort);
                    $dateEndSort = "mdi-arrow-up-bold";
                }
                else {
                    $eventList = $eventList->sortByDesc($sort);
                    $dateEndSort = "mdi-arrow-down-bold";
                }
            }
        @endphp
        
        <!-- Sorting buttons -->
        <button class="sort_button" onclick="sort('title')">Title <span class="mdi {{ $titleSort }}"></span></button>
        <button class="sort_button" onclick="sort('date_start')">Start Date <span class="mdi {{ $dateStartSort }}"></span></button>
        <button class="sort_button" onclick="sort('date_end')">End Date <span class="mdi {{ $dateEndSort }}"></span></button>
        <input type="text" id="filter_text" class="filter_text" placeholder="Filter by Title or Date">
        <div class="event_list">
            <!-- Add each event sorted ascending -->
            @foreach ($eventList as $event)
                @if($event->visibility == 1)
                    <a class="event" href="/event/{{ $event->id }}">
                        <div class='card'>
                            <p><b>{{ $event->title }}</b> </br>
                            Date(s): <span>{{ $event->date_start }}</span> to <span>{{ $event->date_end }}</span></p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

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
                    url.searchParams.set("asc", "false");
                       
                }
                // Updates page
                window.location = url;
            }

            // Event listener on filter text change
            let filter_text = document.getElementById("filter_text");
            filter_text.addEventListener('input', filter);
            
            // Hides/shows events based on text in the title and dates
            function filter(text) {

                // Converts text "prototype" into value
                text = text.currentTarget.value;

                // Converts text to lower case
                text = text.toLowerCase();

                // Get array of events
                events = document.getElementsByClassName("event");

                // Loop through every event
                for (var x = 0; x < events.length; x++) {

                    // Get title of each event
                    title = events[x].getElementsByTagName("b")[0].innerHTML.toLowerCase();

                    // Get the dates of each event
                    beginDate = events[x].getElementsByTagName("span")[0].innerHTML.toLowerCase();
                    endDate = events[x].getElementsByTagName("span")[1].innerHTML.toLowerCase();

                    // If the text is not in the title or date
                    if (title.indexOf(text) == -1 && beginDate.indexOf(text) == -1 && endDate.indexOf(text) == -1) {
                        events[x].style.display = "none";
                    }
                    else {
                        events[x].style.display = "inline";
                    }
                }

                
            } // end filter()
            
        </script>
    </body>
</html>
