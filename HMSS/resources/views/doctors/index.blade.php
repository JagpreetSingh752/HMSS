@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Doctors</h2>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add Doctor</a>
</div>
<table class="table table-bordered">
    <thead><tr><th>ID</th><th>Name</th><th>Specialization</th><th>Email</th><th>Phone</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($doctors as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->name }}</td>
        <td>{{ $d->specialization }}</td>
        <td>{{ $d->email }}</td>
        <td>{{ $d->phone }}</td>
        <td>
            <a href="{{ route('doctors.edit',$d) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form action="{{ route('doctors.destroy',$d) }}" method="POST" style="display:inline-block">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $doctors->links() }}
@endsection
