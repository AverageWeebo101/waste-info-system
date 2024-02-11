<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    public function index()
    {
        $wastes = Waste::all();
        return view('waste.index', compact('waste.index'));
    }

    public function create()
    {
        // Logic to show the form for creating a new waste record
    }

    public function store(Request $request)
    {
        // Logic to store a new waste record
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
