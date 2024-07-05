@extends('layouts.app')

@section("title", "Customer List")

@section('content')
    <main class="mt-5">
        <h2>Customer List</h2>
        <div class="row">
            <div class="col text-right">
                <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Customer Code</th>
                    <th style="width: 80%;">Customer Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->CustomerCode }}</td>
                        <td><a href="{{ route('customers.show', ['id' => $customer->id]) }}">{{ $customer->Customer }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
