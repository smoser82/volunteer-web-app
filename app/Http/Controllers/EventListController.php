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
        $newEvent->dates = $request->dates;
        $newEvent->save();

        return redirect('/');
    }
}
