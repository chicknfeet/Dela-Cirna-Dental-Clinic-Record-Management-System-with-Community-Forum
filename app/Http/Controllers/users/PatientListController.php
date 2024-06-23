<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;
use App\Models\Patientlist;
use Illuminate\Http\Request;

class PatientListController extends Controller
{
    public function index(){
        $patientlist = Patientlist::all();
        $patientlist = Patientlist::paginate(10);
        return view('users.patientlist.patientlist', compact('patientlist'));
    }

    public function createPatient(){
        return view('users.patientlist.create');
    }

    public function storePatient(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:6',
            'age' => 'required|integer',
            'phone' => 'required|String|max:11',
            'address' => 'required|string',
        ]);

        $patient = Patientlist::create([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('patientlist')
            ->with('success', 'Patient added successfully!');
    }

    public function deletePatient($id){
        $patient = Patientlist::findOrFail($id);
        $patient->delete();

        return back()
            ->with('success', 'Patient deleted successfully!');
    }

    public function updatePatient($id){
        $patient = Patientlist::findOrFail($id);
        return view('users.patientlist.updatePatient')->with('patient', $patient);
    }

    public function updatedPatient(Request $request, $id){

        $patient = Patientlist::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'phone' => 'required|String',
            'address' => 'required|string',
        ]);

        $patient->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('patientlist')
            ->with('success', 'Patient updated successfully!');
    }

    public function showRecord($patientlistId)
    {
        $patientlist = Patientlist::findOrFail($patientlistId);
        $records = $patientlist->records;

        return view('users.patientlist.showRecord', compact('patientlist', 'records'));
    }
}
