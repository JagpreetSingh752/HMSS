<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:doctors,email',
            'phone' => 'nullable|string',
            'details' => 'nullable|string',
        ]);

        Doctor::create($data);
        return redirect()->route('doctors.index')->with('success', 'Doctor added');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:doctors,email,'.$doctor->id,
            'phone' => 'nullable|string',
            'details' => 'nullable|string',
        ]);

        $doctor->update($data);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return back()->with('success', 'Doctor deleted');
    }
}
