@extends('layouts.app')

@section('title', 'Sales Orders List')

@section('content')
<main class="mt-5">
    <h1>Sales Orders List</h1>
    <div class="row">
        <div class="col text-right mt-3">
            <a href="{{ route('salesorders.create') }}" class="btn btn-primary">+ Add New Sales Order</a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th style="width: 20%;">Sales Order ID</th>
                <th style="width: 20%;">Customer Code</th>
                <th style="width: 20%;">Product Code</th>
                <th style="width: 20%;">Order Date</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesorders as $salesorder)
                <tr>
                    <td>
                        <a href="{{ route('salesorders.show', $salesorder->SalesOrderID) }}" style="text-decoration: none; color: black;">
                            {{ $salesorder->SalesOrderID }}
                        </a>
                    </td>
                    <td>{{ $salesorder->CustomerCode }}</td>
                    <td>{{ $salesorder->ProductCode }}</td>
                    <td>{{ $salesorder->OrderDate }}</td>
                    <td>
                        <form action="{{ route('salesorders.destroy', $salesorder->SalesOrderID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
