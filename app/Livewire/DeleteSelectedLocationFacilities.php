<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WasteLocationFacility;

class DeleteSelectedLocationFacilities extends Component
{
    protected $debug = true;
    public $selectedIds = [];
    

    public function render()
    {
        $facilities = WasteLocationFacility::all();

        return view('livewire.delete-selected-location-facilities', compact('facilities'));
    }

    public function deleteRecord($facilityId)

    {
        $facility = WasteLocationFacility::find($facilityId);

        if ($facility) {
            $facility->delete();
            $this->resetSelectedIds();
            $this->dispatch('recordDeleted', $facilityId);
        }
    }

    public function updatedSelectAll($value)
    {
        $this->selected = $value
            ? Waste::pluck('id')->map(fn ($id) => (string) $id)->toArray()
            : [];
    }


    public function deleteSelected()
    {
        if (count($this->selected) > 0) {
            Waste::whereIn('id', $this->selected)->delete();
            $this->resetSelect();
            $this->dispatch('recordsDeleted', count($this->selected));
            session()->flash('success', 'Selected records deleted successfully!');
        } else {
            session()->flash('warning', 'No records selected for deletion.');
        }
    }

    public function resetSelectedIds()
    {
        $this->selectedIds = [];
    }
}