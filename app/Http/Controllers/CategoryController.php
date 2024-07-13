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
        $productCategories = Category::findOrFail($CategorName);
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
            'Description' => 'required|string|max:255'
        ]);

        Category::create([
            'CategorName' => $request->CategorName,
            'Description' => $request->Description
        ]);

        return redirect()->route('productCategories.index')->with('success', 'Customer Added Successfully!');
    }

    public function update(Request $request, $CategorName)
    {
        $request->validate([
            'CategorName' => 'required|string|max:',
            'Description' => 'required|string'
        ]);

        $productCategories = Category::findOrFail($CategorName);
        Category::create([
            'CategorName' => $request->CategorName,
            'Description' => $request->Description
        ]);

        return redirect()->route('productCategories.index')->with('success', 'Customer Updated Successfully!');
    }
}
