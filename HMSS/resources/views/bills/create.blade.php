@extends('layouts.app')
@section('content')
<h2>Create Bill</h2>
<form action="{{ route('bills.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Appointment</label>
        <select name="appointment_id" class="form-control" required>
            <option value="">-- choose --</option>
            @foreach($appointments as $a)
                <option value="{{ $a->id }}">#{{ $a->id }} - {{ $a->patient->name }} / {{ $a->doctor->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label>Amount</label><input type="number" step="0.01" name="amount" class="form-control" required></div>
    <div class="mb-3"><label>Details</label><textarea name="details" class="form-control"></textarea></div>
    <button class="btn btn-primary">Create</button>
</form>
@endsection
