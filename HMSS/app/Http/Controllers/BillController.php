<?php
namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Appointment;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with('appointment.patient','appointment.doctor')->paginate(12);
        return view('bills.index', compact('bills'));
    }

    public function create()
    {
        $appointments = Appointment::doesntHave('bill')->with('patient','doctor')->get();
        return view('bills.create', compact('appointments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric|min:0',
            'details' => 'nullable|string',
        ]);

        Bill::create($data + ['status' => 'unpaid']);
        return redirect()->route('bills.index')->with('success','Bill created');
    }

    public function edit(Bill $bill)
    {
        return view('bills.edit', compact('bill'));
    }

    public function update(Request $request, Bill $bill)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid',
            'details' => 'nullable|string',
        ]);

        $bill->update($data);
        return redirect()->route('bills.index')->with('success','Bill updated');
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return back()->with('success','Bill deleted');
    }
}
