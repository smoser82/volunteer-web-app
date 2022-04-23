<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Timeslot;
use App\Models\Signup;

use Illuminate\Support\Facades\Auth;

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
        
        if (Auth::check()) {
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
            $newEvent->id_owner = Auth::user()->id;
            $newEvent->save();

            $newTimeslot = new Timeslot;
            $newTimeslot->id_event = $newEvent->id;
            $newTimeslot->name = "Full Event";
            $newTimeslot->datetime_start = $request->date_start;
            $newTimeslot->datetime_end = $request->date_end;
            $newTimeslot->save();
        }

        return redirect('/');
    }

    public function signup($id_timeslot) {
        if (Auth::check()) {
            $newSignup = new Signup;
            $newSignup->id_user = Auth::user()->id;
            $newSignup->id_slot = $request->id_timeslot;
            $newSignup->save();
        }

        return back()->withInput();
    }

    public function removeSignup(Request $request) {
        if (Auth::check()) {
            $signup = Signup::where('id_user', Auth::user()->id)
                            ->where('id_slot', $request->id_timeslot)
                            ->first();

            $signup->delete();
        }

        return back()->withInput();
    }
}
