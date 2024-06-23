@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Calendar</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calendars as $calendar)
                    <tr>
                        <td>{{ $calendar->name }}</td>
                        <td>{{ $calendar->date}}</td>
                        <td>{{ $calendar->time }}</td>
                        <td>
                            <a href="{{ route('updateCalendar', $calendar->id) }}" class="btn btn-warning">Update</a>
                            <form method="post" action="{{ route('deleteCalendar', $calendar->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection

@section('title')
Calendar
@endsection
