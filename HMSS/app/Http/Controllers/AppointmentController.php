<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['doctor','patient'])->paginate(12);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.create', compact('doctors','patients'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'scheduled_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Appointment::create($data + ['status' => 'scheduled']);
        return redirect()->route('appointments.index')->with('success','Appointment created');
    }

    public function edit(Appointment $appointment)
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.edit', compact('appointment','doctors','patients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'scheduled_at' => 'required|date',
            'status' => 'required|in:scheduled,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($data);
        return redirect()->route('appointments.index')->with('success','Appointment updated');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success','Appointment deleted');
    }
}
