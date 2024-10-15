<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Display the list of items
    public function index()
    {
        $items = Item::all();
        return view('itemslist', compact('items'));
    }

    // Show a specific item
    public function show($ItemCode)
    {
        $item = Item::findOrFail($ItemCode);
        return view('item', compact('item'));
    }

    // Show form to create a new item
    public function create()
    {
        return view('item');
    }

    // Store a newly created item in the database
    public function store(Request $request)
    {
        $request->validate([
            'ItemCode' => 'required|unique:items',
            'ItemName' => 'required',
            'ProductCode' => 'required',
            'UnitPrice' => 'required|numeric',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    // Show form to edit an existing item
    public function edit($ItemCode)
    {
        $item = Item::find($ItemCode);
        return view('item', compact('item'));
    }

    // Update an existing item in the database
    public function update(Request $request, $ItemCode)
    {
        $request->validate([
            'ItemName' => 'required',
            'ProductCode' => 'required',
            'UnitPrice' => 'required|numeric',
        ]);

        $item = Item::find($ItemCode);
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    // Delete an item from the database
    public function destroy($ItemCode)
    {
        $item = Item::find($ItemCode);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
