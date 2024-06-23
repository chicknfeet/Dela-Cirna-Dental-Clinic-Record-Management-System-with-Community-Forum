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
        <h2>Add Appointment</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @error('date')
                <div style="color:red">{{ $message }}</div>
            @enderror
            <form method="post" action="{{ route('calendar.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <button type="submit" class="btn btn-primary">Appointment</button>
        </form>
    </div>
@endsection

@section('title')
    Appointment
@endsection