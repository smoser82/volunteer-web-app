<?php

namespace App\Http\Controllers;
use App\models\Event;

use Illuminate\Http\Request;

class EventListController extends Controller
{
    //

    public function index() {
        return view('browse', ['eventList' => Event::all()]);
    }

    public function saveItem(Request $request){
        \Log::info(json_encode($request->all()));

        $newEvent = new Event;
        $newEvent->title = $request->title;
        $newEvent->description = $request->description; 
        $newEvent->date_start = $request->date_start;
        $newEvent->date_end = $request->date_end;
        if ($request->visibility == "on") {
            $newEvent->visibility = 1;
        } else {
            $newEvent->visibility = 0;
        }
        $newEvent->contact_name = $request->contact_name;
        $newEvent->contact_email = $request->contact_email;
        $newEvent->id_owner = 1;
        $newEvent->save();

        return redirect('/');
    }
}
