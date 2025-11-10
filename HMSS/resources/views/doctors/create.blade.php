@extends('layouts.app')
@section('content')
<h2>Add Doctor</h2>
<form action="{{ route('doctors.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Specialization</label>
        <input type="text" name="specialization" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label>Details</label>
        <textarea name="details" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection
