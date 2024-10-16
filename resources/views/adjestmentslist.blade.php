@extends('layouts.app')

@section('title', 'Adjestments List')

@section('content')
    <main class="mt-5">
        <h1>Adjestments List</h1>

        <a href="{{ route('adjestments.create') }}" class="btn btn-primary">Add New Adjestment</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th style="width: 15%;">Return Code</th>
                    <th style="width: 15%;">Customer</th>
                    <th style="width: 15%;">Product Code</th>
                    <th style="width: 10%;">Item Code</th>
                    <th style="width: 10%;">Quantity</th>
                    <th style="width: 10%;">Return Date</th>
                    <th style="width: 25%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adjestments as $adjestment)
                    <tr>
                        <td>
                            <a href="{{ route('adjestments.show', $adjestment->ReturnCode) }}" style="text-decoration: none; color: black;">
                                {{ $adjestment->ReturnCode }}
                            </a>
                        </td>
                        <td>{{ $adjestment->Customer }}</td>
                        <td>{{ $adjestment->ProductCode }}</td>
                        <td>{{ $adjestment->ItemCode }}</td>
                        <td>{{ $adjestment->Quantity }}</td>
                        <td>{{ $adjestment->ReturnDate }}</td>
                        <td>
                            <a href="{{ route('adjestments.edit', $adjestment->ReturnCode) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('adjestments.destroy', $adjestment->ReturnCode) }}" method="POST" style="display:inline-block;">
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
