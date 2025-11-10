@extends('layouts.app')
@section('content')
<h2>Edit Bill</h2>
<form action="{{ route('bills.update',$bill) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label>Amount</label><input type="number" step="0.01" name="amount" class="form-control" value="{{ $bill->amount }}" required></div>
    <div class="mb-3"><label>Status</label>
        <select name="status" class="form-control"><option value="unpaid" {{ $bill->status=='unpaid'?'selected':'' }}>Unpaid</option><option value="paid" {{ $bill->status=='paid'?'selected':'' }}>Paid</option></select>
    </div>
    <div class="mb-3"><label>Details</label><textarea name="details" class="form-control">{{ $bill->details }}</textarea></div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
