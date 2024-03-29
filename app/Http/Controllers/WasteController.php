<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    public function index()
    {
        $waste = Waste::all();
        return view('wastes.index', compact('waste'));
    }

    public function create()
    {
        return view('wastes.create');
    }    

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'WasteID' => 'required|unique:wastes', 
            'WasteName' => 'required',
            
        ]);

        // Create
        Waste::create($request->all());

        return redirect()->route('wastes.index')->with('success', 'Waste record created successfully!');
    }

    public function show($id)
    {
        $waste = Waste::findOrFail($id);
        return view('wastes.show', compact('waste'));
    }

    public function edit($id)
    {
        $waste = Waste::findOrFail($id);
        return view('wastes.edit', compact('waste'));
    }

    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'WasteID' => 'required|unique:wastes,WasteID,' . $id, 
            'WasteName' => 'required',
            
        ]);

        // Update
        $waste = Waste::findOrFail($id);
        $waste->update($request->all());

        return redirect()->route('wastes.index')->with('success', 'Waste record updated successfully!');
    }

    public function destroy($id)
    {
        $waste = Waste::findOrFail($id);
        $waste->delete();

        return redirect()->route('wastes.index')->with('success', 'Waste record deleted successfully!');
    }
}
