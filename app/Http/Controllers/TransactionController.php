<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\StockLocation;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactionslist', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        $stocklocations = StockLocation::all();
        $items = Item::all();
        return view('transaction', compact('products', 'stocklocations', 'items'));
    }

    public function show($TransactionCode)
    {
        $transaction = Transaction::findOrFail($TransactionCode);
        $products = Product::all();
        $stocklocations = StockLocation::all();
        $items = Item::all();
        return view('transaction', compact('transaction', 'products', 'stocklocations', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'TransactionCode' => 'required|string|max:6',
            'ItemCode' => 'required|string',
            'Date' => 'required|date',
            'Qty' => 'required|integer',
            'TransactionType' => 'required|string',
            'StockLocation' => 'required|string',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully');
    }

    public function update(Request $request, $TransactionCode)
    {
        $request->validate([
            'TransactionCode' => 'required|string|max:6',
            'ItemCode' => 'required|string',
            'Date' => 'required|date',
            'Qty' => 'required|integer',
            'TransactionType' => 'required|string',
            'StockLocation' => 'required|string',
        ]);

        $transactions = Transaction::findOrFail($TransactionCode);
        $transactions->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    public function destroy($TransactionCode)
    {
        $transactions = Transaction::find($TransactionCode);
        $transactions->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
