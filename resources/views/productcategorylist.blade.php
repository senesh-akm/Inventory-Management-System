@extends('layouts.app')

@section("title", "Product Category List")

@section('content')
    <main class="mt-5">
        <h2>Product Category List</h2>
        <div class="row">
            <div class="col text-right mt-3">
                <a href="{{ route('productCategories.create') }}" class="btn btn-primary">+ Add Product Category</a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Product Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productCategories as $productCategory)
                    <tr>
                        <td>
                            <a href="{{ route('productCategories.show', $productCategory->CategorName) }}" style="text-decoration: none; color: black;">
                                {{ $productCategory->CategorName }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
