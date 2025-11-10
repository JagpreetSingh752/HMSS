@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">New Appointment</a>
</div>
<table class="table table-bordered">
<thead><tr><th>ID</th><th>Doctor</th><th>Patient</th><th>Scheduled At</th><th>Status</th><th>Actions</th></tr></thead>
<tbody>
@foreach($appointments as $a)
<tr>
    <td>{{ $a->id }}</td>
    <td>{{ $a->doctor->name }}</td>
    <td>{{ $a->patient->name }}</td>
    <td>{{ $a->scheduled_at }}</td>
    <td>{{ $a->status }}</td>
    <td>
        <a href="{{ route('appointments.edit',$a) }}" class="btn btn-sm btn-secondary">Edit</a>
        <form action="{{ route('appointments.destroy',$a) }}" method="POST" style="display:inline-block">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
{{ $appointments->links() }}
@endsection
