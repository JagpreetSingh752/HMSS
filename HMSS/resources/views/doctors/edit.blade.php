@extends('layouts.app')
@section('content')
<h2>Edit Doctor</h2>
<form action="{{ route('doctors.update',$doctor) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $doctor->name }}" required>
    </div>
    <div class="mb-3">
        <label>Specialization</label>
        <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $doctor->email }}">
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
    </div>
    <div class="mb-3">
        <label>Details</label>
        <textarea name="details" class="form-control">{{ $doctor->details }}</textarea>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
