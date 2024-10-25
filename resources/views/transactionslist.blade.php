@extends('layouts.app')

@section('title', 'Transactions List')

@section('content')
<main class="mt-5">
    <h1>Transactions List</h1>
    <div class="row">
        <div class="col text-right mt-3">
            <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Add Transaction</a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th style="width: 20%;">Transaction Code</th>
                <th style="width: 40%;">Item Code</th>
                <th style="width: 20%;">Date</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->TransactionCode) }}" style="text-decoration: none; color: black;">
                            {{ $transaction->TransactionCode }}
                        </a>
                    </td>
                    <td>{{ $transaction->ItemCode }}</td>
                    <td>{{ $transaction->Date }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->TransactionCode) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
