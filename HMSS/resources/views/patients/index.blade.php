@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Patients</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
</div>
<table class="table table-bordered">
<thead><tr><th>ID</th><th>Name</th><th>DOB</th><th>Gender</th><th>Phone</th><th>Actions</th></tr></thead>
<tbody>
@foreach($patients as $p)
<tr>
    <td>{{ $p->id }}</td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->dob }}</td>
    <td>{{ $p->gender }}</td>
    <td>{{ $p->phone }}</td>
    <td>
        <a href="{{ route('patients.edit',$p) }}" class="btn btn-sm btn-secondary">Edit</a>
        <form action="{{ route('patients.destroy',$p) }}" method="POST" style="display:inline-block">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
{{ $patients->links() }}
@endsection
