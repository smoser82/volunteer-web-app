<?php

namespace App\Http\Controllers;
use App\models\Event;

use Illuminate\Http\Request;

class EventListController extends Controller
{
    //

    public function browsePage() {
        return view('browse', ['eventList' => Event::all()]);
    }

    public function createPage() {
        return view('create');
    }

    public function eventPage($id_event) {
        $event = Event::where('id', $id_event)->first();
        if ($event != null) {
            return view('event', ['event' => $event]);
        } else {
            return view('notFound');
        }
    }

    public function saveItem(Request $request){
        \Log::info(json_encode($request->all()));

        $newEvent = new Event;
        $newEvent->title = $request->title;
        $newEvent->description = $request->description; 
        $newEvent->dates = $request->dates;
        $newEvent->save();

        return redirect('/');
    }
}
