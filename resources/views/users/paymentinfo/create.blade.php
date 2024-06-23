@extends('layout.app')

@section('content')
    <style>
        div {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 500px;
            margin: auto;
        }
        .form-label {
            font-weight: bold;
        }
        .btn {
            width: 25%;
            margin-top: 10px;
        }
    </style>
    <div class="container">
        <h2>Add Payment</h2>
            @error('date')
                <div style="color:red">{{ $message }}</div>
            @enderror
        <form method="post" action="{{ route('payment.store') }}">
            @csrf
            <div class="mb-3">
                <label for="patient" class="form-label">Patient</label>
                <input type="text" class="form-control" id="patient" name="patient" required>
            </div>
            <div class="mb-3">
                <label for="totalbalance" class="form-label">Total Balance</label>
                <input type="number" class="form-control" id="totalbalance" name="totalbalance" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            @csrf
            <button class="btn btn-primary">Add</button>
        </form>
        <a href="{{ route('paymentinfo') }}" class="btn btn-info mt-3">Cancel</a>
    </div>
@endsection