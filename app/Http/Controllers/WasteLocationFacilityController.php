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

        $request->validate([
            'facility_id' => 'required|unique:waste_location_facilities,facility_id,' . $id, 
            'facility_name' => 'required',
            'facility_address' => 'required',
            'facility_status' => 'required|in:Active,Under Maintenance,Under Renovation,Temporarily Closed,Permanently Closed,Demolished',
            
        ]);

        $facility = WasteLocationFacility::findOrFail($id);
        $facility->update($request->all());

        return redirect()->route('wastes_location.index')->with('success', 'Location Facility record updated successfully!');
    }
    public function destroy($id)
    {
        $facility = WasteLocationFacility::findOrFail($id);
        $facility->delete();

        return response()->json(['message' => 'Location Facility record deleted successfully']);
    }


    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->selectedIds;
    
        if (!empty($selectedIds)) {
            try {
                WasteLocationFacility::destroy($selectedIds);
                return response()->json(['message' => 'Selected records deleted successfully']);
            } catch (\Exception $e) {
                
                return response()->json(['message' => 'Error deleting selected records'], 500);
            }
        }
    
        return response()->json(['message' => 'No records selected for deletion'], 422);
    }
    




}
