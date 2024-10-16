<?php

namespace App\Http\Controllers;

use App\Models\Adjestment;
use Illuminate\Http\Request;

class AdjestmentController extends Controller
{
    public function index()
    {
        $adjestments = Adjestment::all();
        return view('adjestmentslist', compact('adjestments'));
    }

    public function create()
    {
        return view('adjestment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ReturnCode' => 'required|unique:adjestments|max:255',
            'Customer' => 'required|max:255',
            'ProductCode' => 'required|max:255',
            'ItemCode' => 'required|max:255',
            'ReturnDate' => 'required',
            'Quantity' => 'required|integer',
            'Reason' => 'required|max:255',
            'ReceivePerson' => 'required|max:255',
        ]);

        Adjestment::create($request->all());

        return redirect()->route('adjestments.index')->with('success', 'Adjestment created successfully.');
    }

    public function show($ReturnCode)
    {
        $adjestment = Adjestment::find($ReturnCode);
        return view('adjestment', compact('adjestment'));
    }

    public function edit($ReturnCode)
    {
        $adjestment = Adjestment::find($ReturnCode);
        return view('adjestment', compact('adjestment'));
    }

    public function update(Request $request, $ReturnCode)
    {
        $request->validate([
            'Customer' => 'required|max:255',
            'ProductCode' => 'required|max:255',
            'ItemCode' => 'required|max:255',
            'ReturnDate' => 'required',
            'Quantity' => 'required|integer',
            'Reason' => 'required|max:255',
            'ReceivePerson' => 'required|max:255',
        ]);

        $adjestment = Adjestment::find($ReturnCode);
        $adjestment->update($request->all());

        return redirect()->route('adjestments.index')->with('success', 'Adjestment updated successfully.');
    }

    public function destroy($ReturnCode)
    {
        $adjestment = Adjestment::find($ReturnCode);
        $adjestment->delete();

        return redirect()->route('adjestments.index')->with('success', 'Adjestment deleted successfully.');
    }
}
