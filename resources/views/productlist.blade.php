@extends('layouts.app')

@section("title", "Product List")

@section('content')
    <main class="mt-5">
        <h2>Product List</h2>
        <div class="row">
            <div class="col text-right mt-3">
                <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add Product</a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th style="width: 20%;">Product Code</th>
                    <th style="width: 40%;">Product Name</th>
                    <th style="width: 20%;">Product Category</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: black;">
                                {{ $product->ProductCode }}
                            </a>
                        </td>
                        <td>{{ $product->ProductName }}</td>
                        <td>{{ $product->ProductCategory }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
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
