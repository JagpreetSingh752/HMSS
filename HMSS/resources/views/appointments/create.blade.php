@extends('layouts.app')
@section('content')
<h2>New Appointment</h2>
<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Doctor</label>
        <select name="doctor_id" class="form-control" required>
            <option value="">-- choose --</option>
            @foreach($doctors as $d)
                <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->specialization }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label>Patient</label>
        <select name="patient_id" class="form-control" required>
            <option value="">-- choose --</option>
            @foreach($patients as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label>Scheduled At</label><input type="datetime-local" name="scheduled_at" class="form-control" required></div>
    <div class="mb-3"><label>Notes</label><textarea name="notes" class="form-control"></textarea></div>
    <button class="btn btn-primary">Create</button>
</form>
@endsection
