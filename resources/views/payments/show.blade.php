<!-- resources/views/payments/show.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Payment Details</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $payment->id }}</td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>{{ $payment->student_id }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{ $payment->payment_method }}</td>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ $payment->payment_type }}</td>
                        </tr>
                        <tr>
                            <th>Payment Instructions</th>
                            <td>{{ $payment->payment_instructions }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $payment->payment_status }}</td>
                        </tr>
                        <tr>
                            <th>Proof of Payment</th>
                            <td>{{ $payment->proof_of_payment }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
