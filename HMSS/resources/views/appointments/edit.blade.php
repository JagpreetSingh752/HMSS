@extends('layouts.app')
@section('content')
<h2>Edit Appointment</h2>
<form action="{{ route('appointments.update',$appointment) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label>Doctor</label>
        <select name="doctor_id" class="form-control" required>
            <option value="">-- choose --</option>
            @foreach($doctors as $d)
                <option value="{{ $d->id }}" {{ $d->id==$appointment->doctor_id?'selected':'' }}>{{ $d->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label>Patient</label>
        <select name="patient_id" class="form-control" required>
            <option value="">-- choose --</option>
            @foreach($patients as $p)
                <option value="{{ $p->id }}" {{ $p->id==$appointment->patient_id?'selected':'' }}>{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label>Scheduled At</label><input type="datetime-local" name="scheduled_at" class="form-control" value="{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('Y-m-d\TH:i') }}" required></div>
    <div class="mb-3"><label>Status</label>
        <select name="status" class="form-control"><option value="scheduled" {{ $appointment->status=='scheduled'?'selected':'' }}>Scheduled</option><option value="completed" {{ $appointment->status=='completed'?'selected':'' }}>Completed</option><option value="cancelled" {{ $appointment->status=='cancelled'?'selected':'' }}>Cancelled</option></select>
    </div>
    <div class="mb-3"><label>Notes</label><textarea name="notes" class="form-control">{{ $appointment->notes }}</textarea></div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
