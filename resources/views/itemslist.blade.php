@extends('layouts.app')

@section("title", "Items List")

@section('content')
    <main class="mt-5">
        <h1>Items List</h1>
        <div class="row">
            <div class="col text-right mt-3">
                <a href="{{ route('items.create') }}" class="btn btn-primary">+ Add New Item</a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th style="width: 20%;">Item Code</th>
                    <th style="width: 30%;">Item Name</th>
                    <th style="width: 20%;">Item Serial</th>
                    <th style="width: 20%;">Unit Price</th>
                    <th style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            <a href="{{ route('items.show', $item->ItemCode) }}" style="text-decoration: none; color: black;">
                                {{ $item->ItemCode }}
                            </a>
                        </td>
                        <td>{{ $item->ItemName }}</td>
                        <td>{{ $item->ItemSerial }}</td>
                        <td>{{ $item->UnitPrice }}</td>
                        <td>
                            <form action="{{ route('items.destroy', $item->ItemCode) }}" method="POST" style="display:inline-block;">
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
