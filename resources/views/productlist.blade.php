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
                    <th style="width: 80%;">Product Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td style="text-decoration: none; color: black;">{{ $product->ProductCode }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: black;">
                                {{ $product->ProductName }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
