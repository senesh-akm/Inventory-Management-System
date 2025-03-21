<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $productCategories = Category::all();
        return view('productcategorylist', compact('productCategories'));
    }

    public function show($CategorName)
    {
        $productCategory = Category::where('CategorName', $CategorName)->firstOrFail();
        return view('productcategory', compact('productCategory'));
    }

    public function create()
    {
        return view('productcategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CategorName' => 'required|string|max:30',
            'Description' => 'string|max:255'
        ]);

        Category::create([
            'CategorName' => $request->CategorName,
            'Description' => $request->Description,
        ]);

        return redirect()->route('productCategories.index')->with('success', 'Product Category Added Successfully!');
    }

    public function update(Request $request, $CategorName)
    {
        $request->validate([
            'CategorName' => 'required|string|max:30',
            'Description' => 'required|string|max:255'
        ]);

        $productCategory = Category::where('CategorName', $CategorName)->firstOrFail();
        $productCategory->update($request->only(['CategorName', 'Description']));

        return redirect()->route('productCategories.index')->with('success', 'Product Category Updated Successfully!');
    }
}
