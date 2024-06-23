@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Patient List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('patient.create') }}" class="btn btn-primary">Add Patient</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Phone No.</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patientlist as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->phone}}</td>
                        <td>{{ $patient->address}}</td>
                        <td>
                            <a href="{{ route('showRecord', $patient->id) }}" class="btn btn-info">View Record</a>
                            <a href="{{ route('updatePatient', $patient->id) }}" class="btn btn-warning">Update</a>
                            <form method="post" action="{{ route('deletePatient', $patient->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- pagination here -->
        @if ($patientlist->lastPage() > 1)
            <ul class="pagination">
                <!-- Previous Page Link -->
                @if ($patientlist->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $patientlist->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                    </li>
                @endif

                <!-- Pagination Elements -->
                @for ($i = 1; $i <= $patientlist->lastPage(); $i++)
                    @if ($i == $patientlist->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $patientlist->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                <!-- Next Page Link -->
                @if ($patientlist->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $patientlist->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true">&raquo;</span>
                    </li>
                @endif
            </ul>
        @endif
    </div>
@endsection

@section('title')
    Patient List
@endsection