@extends('layouts.app')
@section('content')
<h2>Add Patient</h2>
<form action="{{ route('patients.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
    <div class="mb-3"><label>DOB</label><input type="date" name="dob" class="form-control"></div>
    <div class="mb-3"><label>Gender</label>
        <select name="gender" class="form-control"><option value="">--</option><option value="male">Male</option><option value="female">Female</option><option value="other">Other</option></select>
    </div>
    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
    <div class="mb-3"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
    <div class="mb-3"><label>Address</label><textarea name="address" class="form-control"></textarea></div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection
