<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Timeslot;
use App\Models\Signup;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $timeslots = null;
            if (Auth::check()) {
                $timeslots = DB::select(
                    'SELECT * FROM timeslots t LEFT OUTER JOIN
                    (SELECT id_user, id_slot FROM signups WHERE id_user = ?) s
                    ON s.id_slot = t.id WHERE t.id = ?;' , [Auth::user()->id, $id_event]);
            }
            return view('event', ['event' => $event, 'timeslots' => $timeslots]);
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
            // if ($request->visibility == "on") {
            //     $newEvent->visibility = 1;
            // } else {
            //     $newEvent->visibility = 0;
            // }
            $newEvent->visibility = 1;
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

    public function signup(Request $request) {
        if (Auth::check()) {
            $existingSignup = Signup::where('id_user', Auth::user()->id)
                ->where('id_slot', $request->id_timeslot)
                ->first();

            // Only add signup if one doesn't already exist
            if ($existingSignup == null) {
                $newSignup = new Signup;
                $newSignup->id_user = Auth::user()->id;
                $newSignup->id_slot = $request->id_timeslot;
                $newSignup->save();
            }   
        }

        return back()->withInput();
    }

    public function removeSignup(Request $request) {
        if (Auth::check()) {
            $signups = Signup::where('id_user', Auth::user()->id)
                ->where('id_slot', $request->id_timeslot)
                ->get();
            
            // Remove all signups the user has for this timeslot
            foreach ($signups as $signup) {
                $signup->delete();
            }
        }

        return back()->withInput();
    }

    public function removeEvent(Request $request) {
        $timeslots = Timeslot::where('id_event', $request->id_event)->get();

        // For each timeslot associated with this event
        foreach ($timeslots as $timeslot) {
            $signups = Signup::where('id_slot', $timeslot->id)->get();
            
            // Remove all signups
            foreach ($signups as $signup) {
                $signup->delete();
            }

            $timeslot->delete();
        }

        // Then remove the event itself
        $event = Event::where('id', $request->id_event)->first();

        $event->delete();

        return redirect('/');
    }
}
