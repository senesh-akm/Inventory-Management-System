@extends('layouts.app')

@section("title", "Customer List")

@section('content')
    <main class="mt-5">
        <h2>Customer List</h2>
        <div class="row">
            <div class="col text-right mt-3">
                <a href="{{ route('customers.create') }}" class="btn btn-primary">+ Add Customer</a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th style="width: 20%;">Customer Code</th>
                    <th style="width: 80%;">Customer Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td style="text-decoration: none; color: black;">{{ $customer->CustomerCode }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer->id) }}" style="text-decoration: none; color: black;">
                                {{ $customer->Customer }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
