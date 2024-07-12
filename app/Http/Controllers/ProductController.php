<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display the product list
    public function index()
    {
        $products = Product::all();
        return view('productlist', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('product', compact('suppliers'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $suppliers = Supplier::all();
        return view('product', compact('product', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductCode' => 'required|string|max:5',
            'ProductName' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'ProductCategory' => 'required|string|max:255',
            'SupplierName' => 'required|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductCode' => 'required|string|max:255',
            'ProductName' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'ProductCategory' => 'required|string|max:255',
            'SupplierName' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
}
