@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Update Payment</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('updatedPayment', $payment->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="patient" class="form-label">Patient</label>
                <input type="text" class="form-control" id="patient" name="patient" value="{{ old('patient', $payment->patient) }}" required>
            </div>
            <div class="mb-3">
                <label for="totalbalance" class="form-label">Total Balance</label>
                <input type="number" class="form-control" id="totalbalance" name="totalbalance" value="{{ old('totalbalance', $payment->totalbalance) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $payment->description) }}" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{  old('amount', $payment->amount) }}" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{  old('date', $payment->date) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('paymentinfo') }}" class="btn btn-info mt-3">Cancel</a>
    </div>
@endsection

@section('title')
    Update Patient
@endsection