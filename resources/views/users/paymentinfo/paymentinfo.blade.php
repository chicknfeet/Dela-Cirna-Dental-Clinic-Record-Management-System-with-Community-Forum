@extends('layout.app')

@section('content')
<style>
    h1{
        text-align: center;
    }
</style>
    <div class="container">
        <h2>Payment Info</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('payment.create') }}" class="btn btn-primary">Add Payment</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Total Balance</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentinfo as $payment)
                    <tr>
                        <td>{{ $payment->patient }}</td>
                        <td>{{ $payment->totalbalance }}</td>
                        <td>{{ $payment->description }}</td>
                        <td>{{ $payment->amount}}</td>
                        <td>{{ $payment->date}}</td>
                        <td>
                            <a href="{{ route('updatePayment', $payment->id) }}" class="btn btn-warning">Update</a>
                            <form method="post" action="{{ route('deletePayment', $payment->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- pagination here -->
        @if ($paymentinfo->lastPage() > 1)
            <ul class="pagination">
                <!-- Previous Page Link -->
                @if ($paymentinfo->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paymentinfo->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                    </li>
                @endif

                <!-- Pagination Elements -->
                @for ($i = 1; $i <= $paymentinfo->lastPage(); $i++)
                    @if ($i == $paymentinfo->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $paymentinfo->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                <!-- Next Page Link -->
                @if ($paymentinfo->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paymentinfo->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
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
Payment Info
@endsection
