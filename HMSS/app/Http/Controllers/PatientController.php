<?php
namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'email' => 'nullable|email|unique:patients,email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Patient::create($data);
        return redirect()->route('patients.index')->with('success', 'Patient added');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'email' => 'nullable|email|unique:patients,email,'.$patient->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $patient->update($data);
        return redirect()->route('patients.index')->with('success', 'Patient updated');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return back()->with('success', 'Patient deleted');
    }
}
