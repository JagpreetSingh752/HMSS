@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Bills</h2>
    <a href="{{ route('bills.create') }}" class="btn btn-primary">Create Bill</a>
</div>
<table class="table table-bordered">
<thead><tr><th>ID</th><th>Appointment</th><th>Patient</th><th>Amount</th><th>Status</th><th>Actions</th></tr></thead>
<tbody>
@foreach($bills as $b)
<tr>
    <td>{{ $b->id }}</td>
    <td>#{{ $b->appointment->id }} - {{ $b->appointment->doctor->name }}</td>
    <td>{{ $b->appointment->patient->name }}</td>
    <td>{{ $b->amount }}</td>
    <td>{{ $b->status }}</td>
    <td>
        <a href="{{ route('bills.edit',$b) }}" class="btn btn-sm btn-secondary">Edit</a>
        <form action="{{ route('bills.destroy',$b) }}" method="POST" style="display:inline-block">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
{{ $bills->links() }}
@endsection
