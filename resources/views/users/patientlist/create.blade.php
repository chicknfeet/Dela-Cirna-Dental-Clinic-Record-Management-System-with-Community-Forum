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
        <h2>Add Patient</h2>
            @error('date')
                <div style="color:red">{{ $message }}</div>
            @enderror
        <form method="post" action="{{ route('patient.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Patient Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone No</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            @csrf
            <button class="btn btn-primary">Add</button>
        </form>

        <a href="{{ route('patientlist') }}" class="btn btn-info mt-3">Cancel</a>
    </div>
@endsection

@section('title')
    Create Patient
@endsection