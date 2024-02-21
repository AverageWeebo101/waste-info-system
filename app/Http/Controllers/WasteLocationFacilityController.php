<?php

namespace App\Http\Controllers;

use App\Models\WasteLocationFacility;
use Illuminate\Http\Request;

class WasteLocationFacilityController extends Controller
{
    public function index()
    {
        $facilities = WasteLocationFacility::all();
        return view('wastes_location.index', compact('facilities'));
    }

    public function create()
    {
        return view('wastes_location.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'facility_id' => 'required|unique:waste_location_facilities', 
            'facility_name' => 'required',
            'facility_address' => 'required',
            'facility_status' => 'required|in:Active,Under Maintenance,Under Renovation,Temporarily Closed,Permanently Closed,Demolished',
            
        ]);

        // Create
        WasteLocationFacility::create($request->all());

        return redirect()->route('wastes_location.index')->with('success', 'Location Facility record created successfully!');
    }

    public function show($id)
    {
        $facility = WasteLocationFacility::findOrFail($id);
        return view('wastes_location.show', compact('facility'));
    }

    public function edit($id)
    {
        $facility = WasteLocationFacility::findOrFail($id);
        return view('wastes_location.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'facility_id' => 'required|unique:waste_location_facilities,facility_id,' . $id, // Ignore the current record for uniqueness check
            'facility_name' => 'required',
            'facility_address' => 'required',
            'facility_status' => 'required|in:Active,Under Maintenance,Under Renovation,Temporarily Closed,Permanently Closed,Demolished',
            // Add more fields and rules as needed
        ]);

        // Update
        $facility = WasteLocationFacility::findOrFail($id);
        $facility->update($request->all());

        return redirect()->route('wastes_location.index')->with('success', 'Location Facility record updated successfully!');
    }
        // Delete !!
    public function destroy($id)
    {
        $facility = WasteLocationFacility::findOrFail($id);
        $facility->delete();

        return redirect()->route('wastes_location.index')->with('success', 'Location Facility record deleted successfully!');
    }
}
