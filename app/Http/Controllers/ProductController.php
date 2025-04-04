<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $productCategories = Category::all();
        return view('product', compact('suppliers', 'productCategories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $suppliers = Supplier::all();
        $productCategories = Category::all();
        return view('product', compact('product', 'suppliers', 'productCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductCode' => 'required|string|max:50',
            'ProductName' => 'required|string|max:255',
            'Description' => 'string|max:255',
            'ProductCategory' => 'required|string|max:255',
            'SupplierName' => 'required|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductCode' => 'required|string|max:50',
            'ProductName' => 'required|string|max:255',
            'Description' => 'string|max:255',
            'ProductCategory' => 'required|string|max:255',
            'SupplierName' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
