<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        $calendars = Calendar::all();
        return view('users.calendar.calendar', compact('calendars'));
    }
    public function createCalendar(){
        return view('users.appointment.appointment');
    }
    
    public function storeCalendar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $calendar = Calendar::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('appointment')->with('success', 'Appointment added successfully!');
    }
    public function deleteCalendar($id){
        $calendar = Calendar::findOrFail($id);
        $calendar->delete();

        return back()
            ->with('success', 'Appointment deleted successfully!');
    }

    public function updateCalendar($id){
        $calendar = Calendar::findOrFail($id);
        return view('users.calendar.updateCalendar')->with('calendar', $calendar);
    }

    public function updatedCalendar(Request $request, $id){

        $calendar = Calendar::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $calendar->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('calendar')
            ->with('success', 'Appointment updated successfully!');
    }
}
