@extends('layouts.app')
@section('content')
<h2>Edit Patient</h2>
<form action="{{ route('patients.update',$patient) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="{{ $patient->name }}" required></div>
    <div class="mb-3"><label>DOB</label><input type="date" name="dob" class="form-control" value="{{ $patient->dob }}"></div>
    <div class="mb-3"><label>Gender</label>
        <select name="gender" class="form-control"><option value="">--</option><option value="male" {{ $patient->gender=='male'?'selected':'' }}>Male</option><option value="female" {{ $patient->gender=='female'?'selected':'' }}>Female</option><option value="other" {{ $patient->gender=='other'?'selected':'' }}>Other</option></select>
    </div>
    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ $patient->email }}"></div>
    <div class="mb-3"><label>Phone</label><input type="text" name="phone" class="form-control" value="{{ $patient->phone }}"></div>
    <div class="mb-3"><label>Address</label><textarea name="address" class="form-control">{{ $patient->address }}</textarea></div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
