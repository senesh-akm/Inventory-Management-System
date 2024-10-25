<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $adjestments = Transaction::all();
        return view('transactionslist', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transaction', compact('products'));
    }

    public function show($TransactionCode)
    {
        $transaction = Transaction::findOrFail($TransactionCode);
        $products = Product::all();
        return view('transaction', compact('transaction', 'products'));
    }

    public function edit($TransactionCode)
    {
        $transaction = Transaction::findOrFail($TransactionCode);
        $products = Product::all();
        return view('transaction', compact('transaction', 'products'));
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

        $transaction = Transaction::findOrFail($TransactionCode);
        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    public function destroy($TransactionCode)
    {
        $transaction = Transaction::find($TransactionCode);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
